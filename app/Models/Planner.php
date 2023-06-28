<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    use HasFactory;
    use Filterable; // Подключаем созданный трейт

    protected $table = 'planners';
    protected $guarded = [];
    protected $fillable = [];

    public function getAuthor()
    {
        return $this->author();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
