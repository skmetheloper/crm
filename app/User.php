<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'visibility_group',
        'active_flag',
        'permission_set',
        'last_login'
    ];

    protected $guarded = [
        'id'
    ];
}
