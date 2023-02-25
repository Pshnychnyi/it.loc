<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $por_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Список портфолио';

    	$this->por_rep = $por_rep;

    	$this->template = 'home.portfolio';
    }

    public function index() {

    	$portfolios = $this->getPortfolio();

    	$content = view('home.portfolio_content')->with(['portfolios' => $portfolios])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }

    public function getPortfolio() {
    	return $this->por_rep->get(['alias', 'title', 'service_id', 'img'])->load(['service']);
    }
}
