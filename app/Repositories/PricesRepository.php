<?php  

namespace App\Repositories;

use App\Models\Price;


class PricesRepository extends Repository {

	public function __construct(Price $price) {
		$this->model = $price;
	}
}




?>