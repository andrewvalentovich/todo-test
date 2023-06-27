<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $previewName = 'prev_' . md5(Carbon::now() . '_' . $data['image']->getClientOriginalName()) . '.' .$data['image']->getClientOriginalExtension();
            $previewPath = storage_path() . '/app/public/images/' . $previewName;

            Image::make($data['image'])->fit(150, 150)->save($previewPath);

            $data['preview_image'] = 'images/' . $previewName;
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }

        $task->update($data);

        return redirect()->route('task.index');
    }
}
