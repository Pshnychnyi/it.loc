<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends AdminController
{

	public function __construct(PortfoliosRepository $por_rep) {
		parent::__construct();
		$this->template = 'admin.portfolio.portfolio';

		$this->por_rep = $por_rep;
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

        $this->title = 'Список портфолио';
        $portfolios = $this->getPortfolio();

        $this->content = view('admin.portfolio.portfolio_content')->with(['portfolios' => $portfolios])->render();
       
        return $this->renderOutput();
    }

    public function getPortfolio() {
    	return $this->por_rep->get(['id', 'title', 'alias', 'desc', 'service_id', 'created_at', 'img'], 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Gate::denies('create', new Portfolio)) {
    		abort(403);
    	}

        $this->title = 'Создание портфолио';

        $services = Service::get();

        $this->content = view('admin.portfolio.create_content')->with('services', $services)->render();
       
        return $this->renderOutput();    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {

    	if(Gate::denies('create', new Portfolio)) {
    		abort(403);
    	}

        $data = $request->validated();

       	$data['alias'] = Str::slug($data['title']);
       	
       	$data['img'] = $request->file('img')->store('img');
       		
       	if(Portfolio::firstOrCreate($data)) {
       		return redirect()->route('portfolio.index')->with('status', 'Запись добавлена');
       	}

       	return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
    	if(Gate::denies('update', new Portfolio)) {
    		abort(403);
    	}
        $this->title = 'Обновление пункта ' . $portfolio->title;

        $services = Service::get();

        $this->content = view('admin.portfolio.create_content')->with(['portfolio' => $portfolio, 'services' => $services])->render();
       
        return $this->renderOutput();    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {	
    	if(Gate::denies('update', new Portfolio)) {
    		abort(403);
    	}
        $data = $request->validated();

       	$data['alias'] = Str::slug($data['title'], '_');
       
       	if($request->hasFile('img')) {

       		$data['img'] = $request->file('img')->store('img');
       		
       		if (!empty($data['img'])) {
       			if(Storage::disk('public')->exists($portfolio->img)) {
       				Storage::disk('public')->delete($portfolio->img);
       			}
       		}
       		
       	}
       
       	if($portfolio->update($data)) {
       		return redirect()->route('portfolio.index')->with('status', 'Изменения сохранены');
       	}

       	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {	
    	if(Gate::denies('delete', new Portfolio)) {
    		abort(403);
    	}
        if($portfolio) {
    		if(Storage::disk('public')->exists($portfolio->img)) {
	        	Storage::disk('public')->delete($portfolio->img);
	        }

        	if($portfolio->delete()) {
        		return redirect()->route('portfolio.index')->with('status', 'Запись успешно удалена');
        	}

        	return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
