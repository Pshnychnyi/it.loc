<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\MenusRepository;
use App\Repositories\ReviewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ReviewController extends SiteController
{
    public function __construct(ReviewsRepository $rev_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Отзывы';

    	$this->rev_rep = $rev_rep;

    	$this->template = 'home.review';
    }

    public function index() {

    	$reviews = $this->getReview();

    	$content = view('home.review_content')->with(['reviews' => $reviews])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }


    public function getReview() {
    	return $this->rev_rep->get(['name', 'position', 'desc',  'img']);
    }
}
