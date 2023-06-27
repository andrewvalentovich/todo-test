<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Task;

class EditController extends Controller
{
    public function __invoke(Task $task)
    {
        $statuses = Task::getStatuses();

        $tags = Tag::all();
        return view('task.edit', compact('task', 'statuses', 'tags'));
    }
}
