<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\Role;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);

        return redirect()->route('planner.edit', $role->planner->id);
    }
}
