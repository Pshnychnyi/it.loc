<?php  

namespace App\Repositories;

use App\Models\Client;


class ClientsRepository extends Repository {

	public function __construct(Client $client) {
		$this->model = $client;
	}
}




?>