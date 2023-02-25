<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\PricesRepository;
use App\Repositories\TechnologiesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PriceController extends SiteController
{
    public function __construct(PricesRepository $p_rep, TechnologiesRepository $t_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Ценовая политика';

    	$this->p_rep = $p_rep;
    	$this->t_rep = $t_rep;

    	$this->template = 'home.price';
    }

    public function index() {

    	$prices = $this->getPrices();
    	$technologies = $this->getTechnology();

    	$content = view('home.price_content')->with(['prices' => $prices, 'technologies' => $technologies])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }

    public function getPrices() {
    	return $this->p_rep->get(['id', 'title', 'price', 'icon_id'])->load(['technologies', 'icon']);
    }

    public function getTechnology() {
    	return $this->t_rep->get(['id', 'title']);
    }
}
