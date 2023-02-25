<?php

namespace App\Http\Controllers;


use App\Mail\ContactMail;
use App\Models\Menu;
use App\Repositories\AboutsRepository;
use App\Repositories\ClientsRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use App\Repositories\PricesRepository;
use App\Repositories\ReviewsRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\SkillsRepository;
use App\Repositories\SlidersRepository;
use App\Repositories\TeamsRepository;
use App\Repositories\TechnologiesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends SiteController
{

	protected $content;
	protected $s_rep;
	protected $a_rep;
	protected $p_rep;

	public function __construct(SlidersRepository $s_rep, AboutsRepository $a_rep, ServicesRepository $ser_rep, PricesRepository $p_rep, TechnologiesRepository $t_rep, SkillsRepository $skil_rep, PortfoliosRepository $por_rep, ClientsRepository $cli_rep, TeamsRepository $team_rep, ReviewsRepository $rev_rep) {
		parent::__construct(new MenusRepository(new Menu));

		$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Главная страница';

    	$this->s_rep = $s_rep;
    	$this->a_rep = $a_rep;
    	$this->ser_rep = $ser_rep;
    	$this->p_rep = $p_rep;
    	$this->t_rep = $t_rep;
    	$this->skil_rep = $skil_rep;
    	$this->por_rep = $por_rep;
    	$this->cli_rep = $cli_rep;
    	$this->team_rep = $team_rep;
    	$this->rev_rep = $rev_rep;

	}

    public function index(Request $request) {

    	if($request->isMethod('get')) {
    		$sliders = $this->getSlider();
	    	$abouts = $this->getAbout();
	    	$abouts = $this->getAbout();
	    	$services = $this->getService();
	    	$prices = $this->getPrice();
	    	$technologies = $this->getTechnology();
	    	$portfolios = $this->getPortfolio();
	    	$skills = $this->getSkills()->groupBy('category');
	    	$clients = $this->getClient();
	    	$teams = $this->getTeam();
	    	$reviews  = $this->getReview();



	    	$slider = view('home.slider')->with(['sliders' => $sliders])->render();
	    	$this->vars = Arr::add($this->vars, 'slider', $slider);
	    	
	    	$content = view('home.index_content')->with(['abouts' => $abouts, 'services' => $services, 'prices' => $prices, 'technologies' => $technologies, 'skills' => $skills, 'portfolios' => $portfolios, 'clients' => $clients, 'teams' => $teams, 'reviews' => $reviews])->render();
	    	$this->vars = Arr::add($this->vars, 'content', $content);



	    	return $this->renderOutput();
    	}
    }

    public function send(Request $request) {


    	
		$data = $request->except(['_token']);

		$validator = Validator::make($data, [
			'name' => 'required|min:4|max:50',
            'email' => 'required|email',
            'topic' => 'required|max:100',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
        	return \Response::json(['error'=>$validator->errors()]);
        }

        Mail::to('artem0096@gmail.com')->queue(new ContactMail($data));
        
        return response()->json(['success' => 'Сообщение отправлено! Спасибо за Ваш отзыв']);
        


	    

	       

 
    }

    public function getSlider() {
    	return $this->s_rep->get(['title', 'alias', 'desc', 'img']);
    }

    public function getAbout() {
    	return $this->a_rep->get(['title', 'alias', 'content', 'img']);
    }

    public function getService() {
    	return $this->ser_rep->get(['title', 'alias', 'desc', 'icon'])->load(['portfolios', 'icons']);
    }

    public function getPrice() {
    	return $this->p_rep->get(['id', 'title', 'price', 'icon_id'])->load(['technologies', 'icon']);
    }

    public function getTechnology() {
    	return $this->t_rep->get(['id', 'title']);
    }

    public function getSkills() {
    	return $this->skil_rep->get(['percent', 'title', 'category']);
    }

    public function getPortfolio() {
    	return $this->por_rep->get(['alias', 'title', 'service_id', 'img'])->load('service');
    }

    public function getClient() {
    	return $this->cli_rep->get(['id', 'img']);
    }

    public function getTeam() {
    	return $this->team_rep->get(['name', 'position', 'img']);
    }

    public function getReview() {
    	return $this->rev_rep->get(['name', 'position', 'desc',  'img']);
    }
}
