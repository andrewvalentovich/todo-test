<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('planner.create');
    }
}
