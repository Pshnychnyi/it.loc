<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class IndexController extends AdminController
{	

    public function __construct() {
    	parent::__construct();

    	$this->template = 'admin.index';
    	$this->title = 'Панель администратора';
    }

    public function index() {

    	if(Gate::denies('VIEW_ADMIN')) {
    		abort(403);
    	} 

    	$serviceCount = Service::get()->count();
    	$reviewCount = Review::get()->count();
    	$portfolioCount = Portfolio::get()->count();
    	$teamCount = Team::get()->count();
    	$content = view('admin.index_content')->with(['serviceCount' => $serviceCount, 'reviewCount' => $reviewCount, 'portfolioCount' => $portfolioCount, 'teamCount' => $teamCount])->render();
    	$this->vars = Arr::add($this->vars, 'content', $content);


    	return $this->renderOutput();
    }
}
