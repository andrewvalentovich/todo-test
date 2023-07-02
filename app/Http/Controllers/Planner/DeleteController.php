<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Planner;

class DeleteController extends Controller
{
    public function __invoke(Planner $planner)
    {
        foreach ($planner->tasks as $task) {
            $tagsIds = [];

            array_push($tasksIds, $task->id);

            foreach ($task->tags as $tag) {
                array_push($tagsIds, $tag->id);
            }
            $task->tags()->detach($tagsIds);
            unset($tagsIds);

            $task->delete();
        }

        foreach ($planner->roles as $role) {
            $role->user()->dissociate();
            $role->save();
            $role->delete();
        }

        $planner->author()->dissociate();
        $planner->save();

        $planner->delete();

        return redirect()->route('planner.index');
    }
}
