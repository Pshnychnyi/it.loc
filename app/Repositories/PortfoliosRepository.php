<?php  

namespace App\Repositories;

use App\Models\Portfolio;


class PortfoliosRepository extends Repository {

	public function __construct(Portfolio $portfolio) {
		$this->model = $portfolio;
	}
}




?>