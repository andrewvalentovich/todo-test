<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    use HasFactory;

    protected $table = 'planners';
    protected $guarded = [];
    protected $fillable = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'planner_tags', 'planner_id', 'tag_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'planner_id', 'id');
    }
}
