<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\renting;
use App\Models\Notification;
use App\Models\vehicle;
use App\Models\Door_number;
use Illuminate\Support\Facades\DB;
class Indexservice
{
  public function indexlocation()
  {
    return renting::all();
  }
   public function indexnotification($values)
  {
    return Notification::where('id_user',$values)->first();
  }
  public function getvehicule()
  {
  
         $cmd=DB::table('vehicle')
        ->join('Door_number','vehicle.nbdoor_id','=', 'Door_number.id')
        ->join('number_place_limit','Door_number.number_place_id','=', 'number_place_limit.id')
        ->join('gearboxes','number_place_limit.gearboxe_id','=', 'gearboxes.id')
        ->join('energies','gearboxes.energy_id','=', 'energies.id')
        ->join(' types','energies.typ_id','=', ' types.id')
        ->join('model_voitures','types.model_id','=', 'model_voitures.id')
        ->join('marks','model_voitures.mark_id','=', 'marks.id')
         ->select('vehicle.id','vehicle.vehicle_mileage','vehicle.vehicle_price_location','marks.mark_lib','model_voitures.mod_lib')
        ->get();
        return $cmd;
  }
   
}
// SELECT * FROM `vehicles`,door_numbers,place_numbers,gearboxes,energies,types,model_voitures,marks WHERE vehicles.nbdoor_id=door_numbers.id AND door_numbers.number_place_id=place_numbers.id AND place_numbers.gearboxe_id=gearboxes.id AND gearboxes.energy_id=energies.id AND energies.typ_id=types.id AND types.model_id=model_voitures.id AND model_voitures.mark_id=marks.id