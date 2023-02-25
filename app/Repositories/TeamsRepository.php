<?php  

namespace App\Repositories;

use App\Models\Team;


class TeamsRepository extends Repository {

	public function __construct(Team $team) {
		$this->model = $team;
	}
}




?>