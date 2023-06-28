<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $guarded = [];

    public function tasks()
    {
        return $this->belongsToMany(Planner::class, 'planner_tags', 'tag_id', 'planner_id');
    }
}
