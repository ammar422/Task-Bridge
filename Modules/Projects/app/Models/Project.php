<?php

namespace Modules\Projects\Models;

use Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Projects\Database\Factories\ProjectFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        "owner_id",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }
}
