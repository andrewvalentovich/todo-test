<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Http\Filters\PlannerFilter;
use App\Http\Requests\Planner\FilterRequest;
use App\Models\Tag;
use App\Models\Planner;
use App\Models\Task;

class ShowController extends Controller
{
    public function __invoke(FilterRequest $request, Planner $planner)
    {
        $data = $request->validated();
        $data['id'] = $planner->id;
        $filter = app()->make(PlannerFilter::class, ['queryParams' => array_filter($data)]);
        $planner = Planner::filter($filter)->get()[0];
        $statuses = Task::getStatuses();
        $tags = Tag::all();

        return view('planner.show', compact('planner', 'statuses', 'tags'));
    }
}
