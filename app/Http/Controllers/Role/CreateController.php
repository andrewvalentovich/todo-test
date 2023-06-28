<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Planner;
use App\Models\Role;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke(Planner $planner)
    {
        $users = User::where('id', '!=', $planner->author->id)->get();
        $roles = Role::getRoles();
        $planner_id = $planner->id;
        return view('role.create', compact('users', 'roles', 'planner_id'));
    }
}
