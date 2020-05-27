<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';

    protected $fillable = [
        'organization_name',
        'organization_address',
        'label_id',
        'owner_id',
        'activities_to_do',
        'closed_deals',
        'done_activities',
        'last_activities_date',
        'lost_deals',
        'next_activity_date',
        'open_deals',
        'organization_created_at',
        'total_activities',
        'update_time',
        'won_deals',
        'profile_picture'
    ];

    protected $guaded = [
        'organization_id'
    ];
}
