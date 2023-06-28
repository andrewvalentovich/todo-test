<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Planner;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(Planner $planner)
    {
        $planner_id = $planner->id;

        $roles = Role::getRoles();

        $users = User::with('role')
            ->whereHas('role', function($q) use ($planner_id){
                $q->where('planner_id', '=', $planner_id);
            })->get()->sortBy('id');

        return view('planner.edit', compact('planner', 'roles', 'users'));
    }
}
