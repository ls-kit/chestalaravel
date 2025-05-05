<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = ['division_id','name_designation','official_phone','residential_phone','mobile_email'];
}
