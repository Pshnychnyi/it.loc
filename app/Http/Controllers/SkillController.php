<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\SkillsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SkillController extends SiteController
{
    public function __construct(SkillsRepository $skil_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Навыки';

    	$this->skil_rep = $skil_rep;

    	$this->template = 'home.skill';
    }

    public function index() {

    	$skills = $this->getSkills()->groupBy('category');

    	$content = view('home.skill_content')->with(['skills' => $skills])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }


    public function getSkills() {
    	return $this->skil_rep->get(['percent', 'title', 'category']);
    }
}
