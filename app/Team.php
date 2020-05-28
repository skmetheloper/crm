<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'manager',
        'description',
        'members'
    ];

    protected $guarded = [
        'team_id'
    ];
}
