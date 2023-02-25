<?php  

namespace App\Repositories;


abstract class Repository {

	protected $model = false;

	public function get($select = '*', $pagination = false) {
		$builder = $this->model->select($select);
		if($pagination) {
			return $builder->paginate($pagination);
		}


		return $builder->get();
	}


}




?>