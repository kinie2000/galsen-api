<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
     public function images()
    {
        return $this->hasMany(image::class);
        
    }
     public function CaracteristiqueVhs()
    {
        return $this->hasMany(CaracteristiqueVh::class);
        
    }
     public static function boot() {
        parent::boot();

        static::deleting(function($car) { // before delete() method call this
             $car->images()->delete();
             $car->CaracteristiqueVhs()->delete();
             // do the rest of the cleanup...
        });
    }
    use HasFactory;
     protected $fillable = [
        'vehicle_number_place',
        'vehicle_mileage',
        'vehicle_country_registration',
        'vehicle_date_release',
        'vehicle_date_next_control',
        'vehicle_registration',
        'vehicle_adress',
        'vehicle_price_location',
        'vehicle_description',
        'vehicle_number_insurance',
        'vehicle_date_start_insurance',
        'vehicle_date_end_insurance',
        'insurance_id',
        'nbdoor_id',
        'prop_id',
        'status',
        'vehicule_value',
        'vehicule_dispo',
        'longitude',
        'latitude'
    ];
}
