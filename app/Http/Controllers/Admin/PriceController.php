<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Models\Price;
use App\Repositories\PricesRepository;
use App\Repositories\TechnologiesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PriceController extends AdminController
{
    public function __construct(PricesRepository $p_rep, TechnologiesRepository $t_rep) {
		parent::__construct();
		$this->template = 'admin.price.price';

		$this->p_rep = $p_rep;
		$this->t_rep = $t_rep;
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
        $this->title = 'Ценовая политика';
        $prices = $this->getPrice();

        $this->content = view('admin.price.price_content')->with(['prices' => $prices])->render();
       
        return $this->renderOutput();
    }

    public function getPrice() {
    	return $this->p_rep->get(['id', 'title', 'price', 'icon_id'], 3);
    }

    public function getTechnology() {
    	return $this->t_rep->get(['id', 'title']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Gate::denies('create', new Price)) {
    		abort(403);
    	}

        $this->title = 'Создание пункта цена';
        $technologies = $this->getTechnology();
        $icons = Icon::get();

        $this->content = view('admin.price.create_content')->with(['icons' => $icons, 'technologies' => $technologies])->render();
       
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
    	if(Gate::denies('create', new Price)) {
    		abort(403);
    	}
    	
        $tech = $request->except(['_token', 'title', 'price', 'icon_id']);
        $data = $request->only(['title', 'price', 'icon_id']);

        $message = [
        	'required' => 'Поле :attribute обязательно к заполнению',
        	'string' => 'Поле :attribute должно содержать данные строчного типа',
        	'integer' => 'Поле :attribute должно содержать данные числового типа',
        	'max' => 'Поле :attribute не должно привышать 255 символов'
        ];

        $validator = Validator::make($data, [
        	'title' => 'required|string|max:255',
        	'price' => 'required|numeric',
        	'icon_id' => 'required|integer'

        ], $message);

        if ($validator->fails()) {
        	return redirect()->back()->withErrors($validator)->withInput();
        }

        
        
    	$price = Price::create($data);
    	$price->technologies()->attach($tech);
    	return redirect()->route('price.index')->with('status', 'Запись сохранена');
       

        return redirect()->back()->with('error', 'Ошибка сохранения')->withInput();

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
    public function edit(Price $price)
    {
    	if(Gate::denies('update', new Price)) {
    		abort(403);
    	}
        $this->title = 'Редактирование пункта ' . $price->title;
        $technologies = $this->getTechnology();
        $icons = Icon::get();

        $this->content = view('admin.price.create_content')->with(['price' => $price, 'icons' => $icons, 'technologies' => $technologies])->render();
       
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {	
    	if(Gate::denies('update', new Price)) {
    		abort(403);
    	}
        $tech = $request->except(['_token', '_method', 'title', 'price', 'icon_id']);
        $data = $request->only(['title', 'price', 'icon_id']);

        $message = [
        	'required' => 'Поле :attribute обязательно к заполнению',
        	'string' => 'Поле :attribute должно содержать данные строчного типа',
        	'integer' => 'Поле :attribute должно содержать данные числового типа',
        	'max' => 'Поле :attribute не должно привышать 255 символов'
        ];

        $validator = Validator::make($data, [
        	'title' => 'required|string|max:255',
        	'price' => 'required|numeric',
        	'icon_id' => 'required|integer'

        ], $message);

        if ($validator->fails()) {
        	return redirect()->back()->withErrors($validator)->withInput();
        }

       

        if($price->update($data) && $tech) {
        	$price->technologies()->sync($tech);
        	return redirect()->route('price.index')->with('status', 'Изменения сохранены');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {	

    	if(Gate::denies('delete', new Price)) {
    		abort(403);
    	}
        if($price) {
    		$price->technologies()->detach();
        	if($price->delete()) {
        		return redirect()->route('price.index')->with('status', 'Запись успешно удалена');
        	}

        	return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
