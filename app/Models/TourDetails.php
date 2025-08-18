<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourDetails extends Model
{
     use SoftDeletes;
     protected $fillable = ['country_id','information_id','title','description'];

     public function information()
     {
          return $this->belongsTo(Information::class);
     }


}
