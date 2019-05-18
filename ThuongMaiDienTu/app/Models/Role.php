<?php

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'slug',
        'name',
        'permissions',
        'created_at',
        'updated_at'
    ];
}
