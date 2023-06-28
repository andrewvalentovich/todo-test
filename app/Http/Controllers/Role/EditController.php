<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Planner;
use App\Models\Role;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(Role $role, Planner $planner)
    {
        $roles = Role::getRoles();
        return view('role.edit', compact('role', 'roles'));
    }
}
