<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class DeleteController extends Controller
{
    public function __invoke(Role $role)
    {
        $planner_id = $role->planner->id;

        $role->user()->dissociate();
        $role->planner()->dissociate();
        $role->save();
        $role->delete();

        return redirect()->route('planner.edit', $planner_id);
    }
}
