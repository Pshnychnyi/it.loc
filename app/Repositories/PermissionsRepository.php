<?php  

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


class PermissionsRepository extends Repository {

	public function __construct(Permission $permission, Role $rol_rep) {
		$this->model = $permission;

		$this->rol_rep = $rol_rep;
	}


	public function changePermission($request) {

		if(Gate::denies('CHANGE_PERMISSIONS')) {
			abort(403);
		}

		$data = $request->except('_token');

		$roles = $this->rol_rep->get();
		

		foreach($roles as $role) {

			if(isset($data[$role->id])) {
				$role->savePermission($data[$role->id]);
			}else {
				$role->savePermission([]);
			}
		}

		return ['status' => 'Привелегии переопределены'];


	}
}




?>