<?php

namespace Modules\Projects\Models;

use Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\Projects\Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes , HasUuids;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'project_id',
        'user_id',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected static function newFactory(): TaskFactory
    {
        return TaskFactory::new();
    }
}
