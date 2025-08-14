<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable = ['code','name','category_id','day','images'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
