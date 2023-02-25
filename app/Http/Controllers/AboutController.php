<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Menu;
use App\Repositories\AboutsRepository;
use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AboutController extends SiteController
{
    public function __construct(AboutsRepository $a_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'О компании';

    	$this->a_rep = $a_rep;

    	$this->template = 'home.about';
    }

    public function index() {

    	$abouts = $this->getAbout();

    	$content = view('home.about_content')->with(['abouts' => $abouts])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }

    public function getAbout() {
    	return $this->a_rep->get(['title', 'alias', 'content', 'img']);
    }

    public function single(About $about) {

    	$content = view('home.about_single_content')->with(['about' => $about])->render();
    	$this->vars = Arr::add($this->vars, 'content', $content);
    	return $this->renderOutput();
    }
}
