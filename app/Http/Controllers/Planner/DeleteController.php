<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Planner;

class DeleteController extends Controller
{
    public function __invoke(Planner $planner)
    {
        foreach ($planner->tasks as $task) {
            $task->planner()->dissociate();
            $task->save();
        }

        $planner->delete();

        return redirect()->route('planner.index');
    }
}
