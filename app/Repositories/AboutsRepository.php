<?php  

namespace App\Repositories;

use App\Models\About;


class AboutsRepository extends Repository {

	public function __construct(About $about) {
		$this->model = $about;
	}
}




?>