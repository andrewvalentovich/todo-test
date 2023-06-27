<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class ImageUpdateController extends Controller
{
    public function __invoke(Task $task)
    {
        $image = $task['image'];
        $previewImage = $task['preview_image'];

        Storage::disk('public')->put('/images', $image);
        Storage::disk('public')->put('/images', $previewImage);

        $task['image'] = null;
        $task['preview_image'] = null;

        $task->update();

        return redirect()->route('task.edit', compact('task'));
    }
}
