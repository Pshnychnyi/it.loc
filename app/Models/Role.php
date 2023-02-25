<?php

namespace App\Models;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function permissions() {
    	return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users() {
    	return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasPermission($name, $require = false) {
    	if(is_array($name)) {
    		foreach ($name as $permissionName) {
    			$hasPermission = $this->hasPermission($permissionName);

    			if($hasPermission && !$require) {
    				return true;
    			}elseif(!$hasPermission && $require) {
    				return false;
    			}
    		}
    		return $require;
    	}else {
    		foreach ($this->permissions()->get() as $permission) {
    			if ($permission->name == $name) {
    				return true;
    			}
    		}
    	}
    }

    public function savePermission($itemPermissions) {
    	if(!empty($itemPermissions)) {
    		$this->permissions()->sync($itemPermissions);
    	}else {
    		$this->permissions()->detach();
    	}

    	return true;
    }
}
