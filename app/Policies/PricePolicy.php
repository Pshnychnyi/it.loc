<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user) {
    	return $user->canDo('ADD_PRICE');
    }
    public function update(User $user) {
    	return $user->canDo('UPDATE_PRICE');
    }
    public function delete(User $user) {
    	return $user->canDo('DELETE_PRICE');
    }
}
