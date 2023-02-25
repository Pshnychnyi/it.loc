<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TeamController extends AdminController
{
	public function __construct(TeamsRepository $team_rep) {
		parent::__construct();
		$this->template = 'admin.team.team';

		$this->team_rep = $team_rep;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(Gate::denies('VIEW_ADMIN')) {
    		abort(403);
    	}
    	$this->title = 'Список портфолио';
    	$teams = $this->getTeam();

    	$this->content = view('admin.team.team_content')->with(['teams' => $teams])->render();

    	return $this->renderOutput();
    }

    public function getTeam() {
    	return $this->team_rep->get(['id', 'name', 'position', 'img'], 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Gate::denies('create', new Team)) {
    		abort(403);
    	}
    	$this->title = 'Создание члена команды';

    	$this->content = view('admin.team.create_content')->render();

    	return $this->renderOutput();    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
    	if(Gate::denies('create', new Team)) {
    		abort(403);
    	}
    	
    	$data = $request->validated();

    	$data['img'] = $request->file('img')->store('img');

    	if(Team::firstOrCreate($data)) {
    		return redirect()->route('team.index')->with('status', 'Запись добавлена');
    	}

    	return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
    	if(Gate::denies('update', new Team)) {
    		abort(403);
    	}
    	$this->title = 'Редактирование члена команды ' . $team->name;

    	$this->content = view('admin.team.create_content')->with(['team' => $team])->render();

    	return $this->renderOutput();    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
    	if(Gate::denies('update', new Team)) {
    		abort(403);
    	}
    	$data = $request->validated();

    	if($request->hasFile('img')) {

    		$data['img'] = $request->file('img')->store('img');

    		if (!empty($data['img'])) {
    			if(Storage::disk('public')->exists($team->img)) {
    				Storage::disk('public')->delete($team->img);
    			}
    		}

    	}

    	if($team->update($data)) {
    		return redirect()->route('team.index')->with('status', 'Изменения сохранены');
    	}

    	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {	
    	if(Gate::denies('delete', new Team)) {
    		abort(403);
    	}
    	if($team) {
    		if(Storage::disk('public')->exists($team->img)) {
    			Storage::disk('public')->delete($team->img);
    		}

    		if($team->delete()) {
    			return redirect()->route('team.index')->with('status', 'Запись успешно удалена');
    		}

    		return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
