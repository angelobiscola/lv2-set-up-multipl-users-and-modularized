<?php

namespace App\Domains\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden   = ['password', 'remember_token'];

    protected $dates    = ['deleted_at'];
}
