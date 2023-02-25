<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TeamController extends SiteController
{
    public function __construct(TeamsRepository $team_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Наша команда';

    	$this->team_rep = $team_rep;

    	$this->template = 'home.team';
    }

    public function index() {

    	$teams = $this->getTeams();

    	$content = view('home.team_content')->with(['teams' => $teams])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }


    public function getTeams() {
    	return $this->team_rep->get(['name', 'position', 'img']);
    }
}
