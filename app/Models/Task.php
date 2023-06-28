<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use Filterable; // Подключаем созданный трейт

    protected $table = 'tasks';
    protected $fillable = [];
    protected $guarded = [];

    const CLOSE_STATUS = 0;
    const IN_PROGRESS_STATUS = 1;

    public static function getStatuses()
    {
        return [
            self::CLOSE_STATUS => 'Close',
            self::IN_PROGRESS_STATUS => 'In progress'
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tags', 'task_id', 'tag_id');
    }
}
