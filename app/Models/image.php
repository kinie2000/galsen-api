<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
     public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }
    use HasFactory;
       protected $fillable = [
        'title_image',
        'vehicle_id',
       
    ];
}
