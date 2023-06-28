<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Planner;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(Planner $planner)
    {
        $tags = Tag::all();

        $user = User::find(auth()->user()->getAuthIdentifier());
        return view('planner.edit', compact('planner', 'tags', 'user'));
    }
}
