<?php

namespace App\Domains\Admin;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table        = 'oauth_clients';
    protected $fillable     = ['id', 'secret','name'];
    public    $timestamps   = true;

}
