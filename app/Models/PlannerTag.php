<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannerTag extends Model
{
    use HasFactory;

    protected $table = 'planner_tags';
    protected $guarded = [];
    protected $fillable = [];
}
