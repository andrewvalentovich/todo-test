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
            foreach ($task->tags as $tag) {
                array_push($tagsIds, $tag->id);
            }
            $task->tags()->detach($tagsIds);

            unset($tagsIds);

            $task->planner()->dissociate();
            $task->save();
            $task->delete();
        }

        $planner->delete();

        return redirect()->route('planner.index');
    }
}
