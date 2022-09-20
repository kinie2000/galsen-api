<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristiqueVh extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }
    use HasFactory;
      protected $fillable = [
    'caracteristique_principale',
    'ESP',
    'Radio',
    'AirBag',
    'ABS',
    'Direction_assiste',
    'sieg_enfant',
    'GPS',
    'coffre_de_toi',
    'pneu_neige',
    'vehicle_id',    
    ];
}
