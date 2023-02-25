<?php  

namespace App\Repositories;

use App\Models\Skill;


class SkillsRepository extends Repository {

	public function __construct(Skill $skill) {
		$this->model = $skill;
	}

	public function create($data) {
		if(isset($data)) {
			if($this->model->create($data)) {
				return true;
			}
		}

		return false;
	}
}




?>