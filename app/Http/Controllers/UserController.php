<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $role = Role::create(['name' => 'admin']);
        $permission= Permission::create(['name' => 'edit user_status']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

    }
}
