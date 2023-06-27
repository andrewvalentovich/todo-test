<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

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
}
