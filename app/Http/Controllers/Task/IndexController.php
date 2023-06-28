<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Filters\TaskFilter;
use App\Http\Requests\Task\FilterRequest;
use App\Models\Tag;
use App\Models\Task;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TaskFilter::class, ['queryParams' => array_filter($data)]);
        $tasks = Task::filter($filter)->get();
        $tags = Tag::all();
        $statuses = Task::getStatuses();

        return view('task.index', compact('tasks', 'statuses', 'tags'));
    }
}
