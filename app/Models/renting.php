<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class renting extends Model
{
    use HasFactory;
    protected $fillable = ['renting_date_departure', 'renting_date_return','loc_id','vehicle_id'];
}
