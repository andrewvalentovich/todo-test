<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Planner\StoreRequest;
use App\Models\Planner;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Planner::firstOrCreate($data);

        return redirect()->route('planner.index');
    }
}
