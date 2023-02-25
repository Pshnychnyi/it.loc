<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{

    protected $user;
    protected $content;
    protected $template;
    protected $title;
    protected $vars = [];

    public function __construct() {

    }

    public function renderOutput() {
    	$this->vars = Arr::add($this->vars, 'title', $this->title);

    	$menu = $this->getMenu();

    	$navigation = view('admin.navigation')->with('menu', $menu)->render();
		$this->vars = Arr::add($this->vars, 'navigation', $navigation);

    	if($this->content) {
    		$this->vars = Arr::add($this->vars, 'content', $this->content);
    	}

    	$footer = view('admin.footer')->render();
    	$this->vars = Arr::add($this->vars, 'footer', $footer);

    	return view($this->template)->with($this->vars);

    }

    public function getMenu() {
    	$builder = \Menu::make('MyNavBar', function ($menu) {
	        $menu->add('Главная', ['route' => 'admin.index']);
	        $menu->add('О нас', ['route' => 'about.index']);
	        $menu->add('Услуги', ['route' => 'service.index']);
	        $menu->add('Портфолио', ['route' => 'portfolio.index']);
	        $menu->add('Цены', ['route' => 'price.index']);
	        $menu->add('Навыки', ['route' => 'skill.index']);
	        $menu->add('Команда', ['route' => 'team.index']);
	        $menu->add('Отзывы', ['route' => 'review.index']);
	        $menu->add('Роли/Привелегии', ['route' => 'role.index']);
	    });

	    return $builder;
    }
}
