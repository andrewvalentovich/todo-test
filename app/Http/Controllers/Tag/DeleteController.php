<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tasksIds = [];
        foreach ($tag->tasks as $task) {
            array_push($tasksIds, $task->id);
        }
        $tag->tasks()->detach($tasksIds);
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
