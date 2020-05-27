<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    protected $fillable = [
        'team_name',
        'team_manager',
        'team_description',
        'team_members'
    ];

    protected $guarded = [
        'team_id'
    ];
}
