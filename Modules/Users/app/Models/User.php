<?php

namespace Modules\Users\Models;

use Modules\Projects\Models\Project;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Users\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Modules\Users\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'profile_photo_path',
        'phone_number',
        'status',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id');
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
