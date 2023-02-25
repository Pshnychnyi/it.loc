<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
    	return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    
    public function canDo($permission, $require = false) {
    	if(is_array($permission)) {
    		foreach ($permission as $permName) {
    			return $this->canDo($permName);

    			if($permName && !$require) {
    				return true;
    			}else if(!$permName && $require){
    				return false;
    			}

    			return $require;
    		}
    	}else {
    		foreach($this->roles as $role) {
    			foreach($role->permissions as $perm) {
    				if(Str::is($permission, $perm->name)) {
    					return true;
    				}
    			}
    		}
    	}
    }
}
