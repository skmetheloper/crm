<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'organization_id',
        'label_id',
        'phoneDetails_id',
        'emailDetails_id',
        'owner_id',
        'id',
        'activities_to_do',
        'closed_deals',
        'done_activities',
        'email_messages_count',
        'last_activity_date',
        'lost_deals',
        'next_activity_date',
        'open_deals',
        'person_created_at',
        'profile_pic',
        'total_activities',
        'update_time',
        'visible_to',
        'won_deals'
    ];

    protected $guarded = [
        'people_id'
    ];
}
