<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AboutPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function view(User $user) {
    	return $user->canDo('VIEW_ADMIN');
    }

    public function create(User $user) {
    	return $user->canDo('ADD_ABOUT');
    }
    public function update(User $user) {
    	return $user->canDo('UPDATE_ABOUT');
    }
    public function delete(User $user) {
    	return $user->canDo('DELETE_ABOUT');
    }
}
