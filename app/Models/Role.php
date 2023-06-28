<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = [];

    const READ = 'read';
    const EDIT = 'edit';

    public static function getRoles()
    {
        return [
            self::READ => 'read',
            self::EDIT => 'edit',
        ];
    }

    public function planner()
    {
        return $this->belongsTo(Planner::class, 'planner_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
