<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable = ['code','name','category_id','day','images'];


        protected $casts = [
        'images' => 'array',
    ];

    public function tourDetails()
    {
        return $this->hasMany(TourDetails::class, 'country_id');
    }

    public function category()
    {
        return $this->belongsTo(Information::class, 'category_id');
    }

}
