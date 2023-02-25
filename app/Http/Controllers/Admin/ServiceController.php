<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Models\Service;
use App\Repositories\ServicesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends AdminController
{

	public function __construct(ServicesRepository $ser_rep) {
		parent::__construct();
		$this->template = 'admin.service.service';

		$this->ser_rep = $ser_rep;
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
        $this->title = 'Наши услуги';
        $services = $this->getService();

        $this->content = view('admin.service.service_content')->with(['services' => $services])->render();
       
        return $this->renderOutput();
    }

    public function getService() {
    	return $this->ser_rep->get(['id', 'title', 'alias', 'desc', 'icon', 'created_at'], 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
    	if(Gate::denies('create', new Service)) {
    		abort(403);
    	}
        $this->title = 'Создание пункта услуги';

        $icons = Icon::get();

        $this->content = view('admin.service.create_content')->with('icons', $icons)->render();
       
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if(Gate::denies('create', new Service)) {
    		abort(403);
    	}
    	$data = $request->except('_token');

        $validator = Validator::make($data, [
        	'title' => 'required|max:255', 
        	'desc' => 'required',
        	'icon' => 'required|exists:icons,id'
        ], [
        	'required' => 'Поле :attribute обязательно к заполнению',
        	'max' => 'Поле :attribute должн содержать не больше 255 символов'
        ]);

        if($validator->fails()) {
        	return back()->withErrors($validator)->withInput();
        }

        $data['alias'] = Str::slug($data['title'], '_');



      	if(Service::create($data)) {
      		return redirect()->route('service.index')->with('status', 'Запись успешно добавлена');
      	}
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
    public function edit(Service $service)
    {
    	if(Gate::denies('update', new Service)) {
    		abort(403);
    	}

    	if(isset($service->title)) {

    		$this->title = 'Редактирование путнкта услуг ' . $service->title;

    		$icons = Icon::get();

    		$this->content = view('admin.service.create_content')->with(['icons' => $icons, 'service' => $service])->render();

    		return $this->renderOutput();
    	}
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

    	if(Gate::denies('update', new Service)) {
    		abort(403);
    	}
        $data = $request->except('_token');

        $validator = Validator::make($data, [
        	'title' => 'required|max:255',
        	'desc' => 'required',
        	'icon' => 'required|exists:icons,id'
        ], [
        	'max' => 'Поле :attribute должн содержать не больше 255 символов'
        ]);

        if($validator->fails()) {
        	return back()->withErrors($validator)->withInput();
        }

        $data['alias'] = Str::slug($data['title'], '_');

      	if($service->update($data)) {
      		return redirect()->route('service.index')->with('status', 'Запись сохранена');
      	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
    	if(Gate::denies('delete', new Service)) {
    		abort(403);
    	}
        if($service) {
    	
        	if($service->delete()) {
        		return redirect()->route('service.index')->with('status', 'Запись успешно удалена');
        	}

        	return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
