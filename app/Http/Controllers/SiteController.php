<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use \Menu;

class SiteController extends Controller
{
    protected $m_rep;

    protected $keywords = '';
    protected $meta_desc = '';
    protected $title = '';

    protected $template = 'home.index';

    protected $vars = [];

    public function __construct(MenusRepository $m_rep) {
    	$this->m_rep = $m_rep;
    }

    public function renderOutput() {
    	$menu = $this->getMenu();

    	$navigation = view('navigation')->with('menu', $menu)->render();

    	

    	$footer = view('footer')->render();

    	$this->vars = Arr::add($this->vars, 'navigation', $navigation);
    	$this->vars = Arr::add($this->vars, 'footer', $footer);

    	
    	$this->vars = Arr::add($this->vars, 'keywords', $this->keywords);
    	$this->vars = Arr::add($this->vars, 'meta_desc', $this->meta_desc);
    	$this->vars = Arr::add($this->vars, 'title', $this->title);

    	return view($this->template)->with($this->vars);
    }

    public function getMenu() {
    	$menu = $this->m_rep->get();

    	$mBuilder = Menu::make('MyNav', function($m) use ($menu) {	
    		foreach ($menu as $item) {
    			if($item->parent == 0) {
    				$m->add($item->title, $item->path)->id($item->id);
    			}else {
    				if($m->find($item->parent)) {
    					$m->find($item->parent)->add($item->title, $item->path)->id($item->id);
    				}

    			}
    		}
    	});


    	return $mBuilder;
    }


}
