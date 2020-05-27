<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'label';

    protected $fillable = [
        'label_name'
    ];

    protected $guarded = [
        'label_id'
    ];
}
