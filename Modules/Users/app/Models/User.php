<?php

namespace Modules\Users\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\Users\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
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


    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
