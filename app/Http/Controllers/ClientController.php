<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\ClientsRepository;
use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClientController extends SiteController
{
    public function __construct(ClientsRepository $cli_rep) {
    	parent::__construct(new MenusRepository(new Menu));

    	$this->keywords = 'Ключевики';
    	$this->meta_desc = 'Описание';
    	$this->title = 'Наши клиенты';

    	$this->cli_rep = $cli_rep;

    	$this->template = 'home.client';
    }

    public function index() {

    	$clients = $this->getClient();

    	$content = view('home.client_content')->with(['clients' => $clients])->render();

    	$this->vars = Arr::add($this->vars, 'content', $content);



    	return $this->renderOutput();

    }


    public function getClient() {
    	return $this->cli_rep->get(['id', 'img']);
    }
}
