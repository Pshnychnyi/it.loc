<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionsRepository;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends AdminController
{

	public function __construct(RolesRepository $rol_rep, PermissionsRepository $per_rep) {
		parent::__construct();
		$this->template = 'admin.role.role';

		$this->per_rep = $per_rep;
		$this->rol_rep = $rol_rep;
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
    	$this->title = 'Роли и привелегии пользователей';

    	$roles = $this->getRole();
    	$permissions = $this->getPermission();

    	$this->content = view('admin.role.role_content')->with(['roles' => $roles, 'permissions' => $permissions])->render();

        return $this->renderOutput();
    }

    public function getRole() {
    	return $this->rol_rep->get(['id', 'name']);
    }

    public function getPermission() {
    	return $this->per_rep->get(['id', 'name']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->per_rep->changePermission($request);

        if(is_array($result) && !empty($result['error'])) {
        	return redirect()->back()->with($result);
        }

        return redirect()->back()->with($result);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
