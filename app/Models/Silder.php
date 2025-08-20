<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Silder extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description','image'];

}
