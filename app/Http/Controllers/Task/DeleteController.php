<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class DeleteController extends Controller
{
    public function __invoke(Task $task)
    {
        $tagsIds = [];
        foreach ($task->tags as $tag) {
            array_push($tagsIds, $tag->id);
        }
        $task->tags()->detach($tagsIds);

        unset($tagsIds);

        $task->planner()->dissociate();
        $task->save();
        $task->delete();

        return redirect()->route('task.index');
    }
}
