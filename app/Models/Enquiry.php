<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
  use SoftDeletes;
    protected $fillable = ['name', 'email', 'phone','travel_date','city','total_passenger','select_your_interest'];

}
