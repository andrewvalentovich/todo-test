<?php

namespace App\Http\Controllers\API\Planner;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Planner\StoreRequest;
use App\Models\Planner;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $task = Planner::firstOrCreate($data);
        return json_encode($task);
    }
}
