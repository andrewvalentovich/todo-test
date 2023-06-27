<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('task.create');
    }
}
