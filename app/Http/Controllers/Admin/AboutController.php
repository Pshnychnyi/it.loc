<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Repositories\AboutsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AboutController extends AdminController
{

	public function __construct(AboutsRepository $a_rep) {
		parent::__construct();
		$this->template = 'admin.about.about';

		$this->a_rep = $a_rep;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(Gate::denies('VIEW_ADMIN')) {
    		abort(403);
    	}

        $this->title = 'О нас';
        $abouts = $this->getAbout();

        $this->content = view('admin.about.about_content')->with(['abouts' => $abouts])->render();
       
        return $this->renderOutput();
    }

    public function getAbout() {
    	return $this->a_rep->get(['id', 'title', 'alias', 'content', 'img', 'created_at'], 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Gate::denies('create', new About)) {
    		abort(403);
    	}

    	$this->title = 'Создание пункта о нас';

        $this->content = view('admin.about.create_content')->render();
       
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
    	if(Gate::denies('create', new About)) {
    		abort(403);
    	}

       	$data = $request->validated();

       	$data['alias'] = Str::slug($data['title']);
       	
       	$data['img'] = $request->file('img')->store('img');
       		
       	if(About::firstOrCreate($data)) {
       		return redirect()->route('about.index')->with('status', 'Запись добавлена');
       	}

       	return redirect()->back();

       	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {	

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
    	if(Gate::denies('update', new About)) {
    		abort(403);
    	}
        $this->title = 'Обновление пункта ' . $about->title;

        $this->content = view('admin.about.create_content')->with('about', $about)->render();
       
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, About $about)
    {
    	if(Gate::denies('update', new About)) {
    		abort(403);
    	}

       $data = $request->validated();

       	$data['alias'] = Str::slug($data['title'], '_');
       
       	if($request->hasFile('img')) {

       		$data['img'] = $request->file('img')->store('img');
       		
       		if (!empty($data['img'])) {
       			if(Storage::disk('public')->exists($about->img)) {
       				Storage::disk('public')->delete($about->img);
       			}
       		}
       		
       	}
       
       	if($about->update($data)) {
       		return redirect()->route('about.index')->with('status', 'Изменения сохранены');
       	}

       	return redirect()->back();
       	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
    	if(Gate::denies('delete', new About)) {
    		abort(403);
    	}

    	if($about) {
    		if(Storage::disk('public')->exists($about->img)) {
	        	Storage::disk('public')->delete($about->img);
	        }

        	if($about->delete()) {
        		return redirect()->route('about.index')->with('status', 'Запись успешно удалена');
        	}

        	return back()->with('error', 'Ошибка удаления записи');
    	}
        
    }
}
