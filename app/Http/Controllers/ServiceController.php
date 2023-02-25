<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\ServicesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServiceController extends SiteController
{
    public function __construct(ServicesRepository $ser_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Услуги';

    	$this->ser_rep = $ser_rep;

    	$this->template = 'home.service';
    }

    public function index() {

    	$services = $this->getService();

    	$content = view('home.service_content')->with(['services' => $services])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }


    public function getService() {
    	return $this->ser_rep->get(['title', 'alias', 'desc', 'icon'])->load(['portfolios', 'icons']);
    }
}
