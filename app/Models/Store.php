<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'store_name',
        'store_id',
        'category_id',
        'total_products',
        'city_id',
        'store_age',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function city()
{
    return $this->belongsTo(\App\Models\City::class);
}
}
