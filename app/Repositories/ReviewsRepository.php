<?php  

namespace App\Repositories;

use App\Models\Review;


class ReviewsRepository extends Repository {

	public function __construct(Review $review) {
		$this->model = $review;
	}
}




?>