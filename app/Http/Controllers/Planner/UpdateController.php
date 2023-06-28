<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Planner\UpdateRequest;
use App\Models\Planner;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Planner $planner)
    {
        $data = $request->validated();
        $planner->update($data);

        return redirect()->route('planner.index');
    }
}
