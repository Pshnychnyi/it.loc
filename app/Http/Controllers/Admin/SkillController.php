<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Repositories\SkillsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SkillController extends AdminController
{

	public function __construct(SkillsRepository $skil_rep) {
		parent::__construct();
		$this->template = 'admin.skill.skill';

		$this->skil_rep = $skil_rep;
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
       	$this->title = 'Список навыков';

       	$skills = $this->getSkills();

       	$this->content = view('admin.skill.skill_content')->with(['skills' => $skills])->render();

       	return $this->renderOutput();
    }

    public function getSkills() {
    	return $this->skil_rep->get(['id', 'title', 'percent', 'category']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Gate::denies('create', new Skill)) {
    		abort(403);
    	}
    	$this->title = 'Создание навыка';

       	$this->content = view('admin.skill.create_content')->render();

       	return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
    	if(Gate::denies('create', new Skill)) {
    		abort(403);
    	}
        $data = $request->validated();

        if($this->skil_rep->create($data)) {
        	return redirect()->route('skill.index')->with('status', 'Запись добавлена');
        }
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
    public function edit(Skill $skill)
    {
    	if(Gate::denies('update', new Skill)) {
    		abort(403);
    	}
        $this->title = 'Редактирование навыка ' . $skill->alias;

       	$this->content = view('admin.skill.create_content')->with('skill', $skill)->render();

       	return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, Skill $skill)
    {
    	if(Gate::denies('update', new Skill)) {
    		abort(403);
    	}
        $data = $request->validated();
        if ($skill) {
        	if($skill->update($data)) {
	        	return redirect()->route('skill.index')->with('status', 'Изменения сохранены');
	        }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
    	if(Gate::denies('delete', new Skill)) {
    		abort(403);
    	}
        if($skill) {
    	
        	if($skill->delete()) {
        		return redirect()->route('skill.index')->with('status', 'Запись успешно удалена');
        	}

        	return back()->with('error', 'Ошибка удаления записи');
    	}
    }
}
