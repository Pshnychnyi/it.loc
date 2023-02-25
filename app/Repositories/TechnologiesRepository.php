<?php

namespace App\Repositories;


use App\Models\Technology;


class TechnologiesRepository extends Repository {

	public function __construct(Technology $technology) {
		$this->model = $technology;
	}
	
}




?>