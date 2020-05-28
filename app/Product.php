<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'unit',
        'unit_price',
        'currency',
        'total_price',
        'owner_id',
        'visible_to',
        'active_flag',
        'desription',
        'tax'
    ];

    protected $guarded = [
        'id'
    ];
}
