<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Planner;

class IndexController extends Controller
{
    public function __invoke()
    {
        $planners = Planner::all();
        $tags = Tag::all();

        return view('planner.index', compact('planners', 'tags'));
    }
}
