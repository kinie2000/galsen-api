<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;
use App\Services\Createservice;
use App\Services\Findservice;
use App\Services\Indexservice;
use App\Services\Deleteservice;
use App\Models\vehicle;
use App\Models\Model_voiture;
use App\Models\type;
use App\Models\gearbox;
use App\Models\energy;
use App\Models\place_number;
use App\Models\Door_number;
use App\Models\image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Models\CaracteristiqueVh;


class VehicleController extends Controller
{
          public $createservice ;
    public $Indexservice;
    public $findservice;
    public $deleteservice;

    public function __construct(Createservice $createservice,Findservice $findservice,Indexservice $Indexservice,Deleteservice $deleteservice)
    {
        $this->createservice=$createservice;
        $this->Indexservice=$Indexservice;
        $this->findservice=$findservice;
        $this->deleteservice=$deleteservice;
    }
  
    public function create(VehicleRequest $request)
    {
        //

         $cmd=$request->val;
          $cmd_user=$request->id_user;
 
           
         
         $data=['vehicle_mileage' => $cmd[0]['vehicule_Kilometrage'],'nbdoor_id'=> $cmd[0]['vehicule_NbrPorte']
        ,'vehicle_date_start_insurance'=> $cmd[1]['inssurance_date_start'],'vehicle_date_end_insurance'=> $cmd[1]['inssurance_date_end']
        ,'vehicle_number_insurance'=> $cmd[1]['inssurance_number'],'vehicle_date_next_control'=> $cmd[1]['vehicule_date_next_controle']
        ,'vehicle_date_release'=> $cmd[1]['vehicule_date_release'],'vehicle_registration'=> $cmd[1]['vehicule_immatriculation']
        ,'vehicle_value'=> $cmd[2]['vehicule_value'],'vehicle_dispo'=> $cmd[6]['vehicule_dispo']
        ,'vehicle_adress'=> $cmd[3]['vehicule_address'],'longitude'=> $cmd[3]['long'],'latitude'=> $cmd[3]['lat'],'vehicle_description'=> $cmd[4]['vehicule_description']
        ,'vehicle_price_location'=> $cmd[7]['prixkmjr'],'prop_id'=> $cmd_user['id']
        ];
        
     
       $user=vehicle::create($data);
       
          
            return response(['bon'=>'vehicule bien definis','user'=>$user]);
       
    }

    public function showModel(VehicleRequest $request)
    {
        $id=$request->id;
       return  Model_voiture::where('mark_id',$id)->get();
       
   
    }
       public function showType(VehicleRequest $request)
    {
        $id=$request->id;
       return  type::where('model_id',$id)->get();
    }

       public function showEnergie(VehicleRequest $request)
    {
        $id=$request->id;
       return  energy::where('typ_id',$id)->get();
    }

       public function showBoitVit(VehicleRequest $request)
    {
        $id=$request->id;
       return  gearbox::where('energy_id',$id)->get();
    }
         public function showNbplace(VehicleRequest $request)
    {
        $id=$request->id;
       return  place_number::where('gearboxe_id',$id)->get();
    }

        public function showNbporte(VehicleRequest $request)
    {
        $id=$request->id;
       return  Door_number::where('number_place_id',$id)->get();
    }

    public function saveimage(VehicleRequest $request)
    {
      

 

foreach($request['fileSource'] as $image) {
   
 if(!empty($image)){

     

            //On verifier si le dossier ImageProduct existe dans notre storage
            $folderPath = public_path('/storage/ImageProduct/');

            if(file_exists($folderPath)) {

            } else {

                $folderPath = mkdir("storage/ImageProduct/", 0777, true);
                 move_uploaded_file($folderPath,$image);

            }
            //On récuperer les informations de notre image qu'on range dans un tableau
            $image_parts = explode(";base64,", $image);
         

            //On récuperer la premiere partie de notre preccedant tableau qu'on range à nouveau dans un autre tableau
            $image_type_aux = explode("image/", $image_parts[0]);

            //On récuperer le type de l'image
            $image_type = $image_type_aux[1];

            //On transforme la deuxième partie de notre première tableau en base64_decode
            $image_base64 = base64_decode($image_parts[1]);

            //On verifier si le nom génerer de l'image existe déjà dans le dossier Imageproduct
            $file = $folderPath . uniqid() . '.'.$image_type;

            $file1 = explode('/', $file);
           

    

             //$data['customer_picture']->store('ProfilClient', 'public')

            $i = 1;

            while($file1[$i-1] <> 'ImageProduct' && $i < count($file1)) {

                $i++;

            }

            if($file1[$i-1] == 'ImageProduct') {

                $index = $i - 1;

            }

            $image = $file1[$index].'/'.$file1[$index+1];
      

            file_put_contents($file, $image_base64);
       
              $user=image::create([
            'title_image' =>$image, 
            'vehicle_id'=>$request['id_veh']
        ]);

        }
        
        else
        {
            return 0;
        }
        
}
 
    }
    public function storecaracteristique(VehicleRequest $request)
    {
        $cmd=$request->val;
        
        $data1=['vehicle_id' =>  $cmd['id_veh']];
        $data=['caracteristique_principale' => $cmd['vehicule_description'],'ESP' => $cmd['Sec_ESP'], 'Radio' => $cmd['Sec_Rad'],'AirBag' => $cmd['Sec_Air'], 'ABS' => $cmd['Sec_ABS'], 'Direction_assiste' => $cmd['Sec_Direc'],'sieg_enfant' => $cmd['Sec_sieg_enf'], 'GPS' => $cmd['Sec_GPS'],'coffre_de_toi' => $cmd['Sec_cof'],
         'pneu_neige' => $cmd['Sec_pneu'], 'vehicle_id' => $cmd['id_veh']];
         $user = CaracteristiqueVh::updateOrCreate($data1,$data);
        
    }
     public function showMark()
    {
       return  DB::table('marks')->get();
    }
    public function getallvehicle()
    {
   $cmd=DB::table('vehicles')
        ->join('Door_numbers','vehicles.nbdoor_id','=', 'Door_numbers.id')
        ->join('place_numbers','Door_numbers.number_place_id','=', 'place_numbers.id')
        ->join('gearboxes','place_numbers.gearboxe_id','=', 'gearboxes.id')
        ->join('energies','gearboxes.energy_id','=', 'energies.id')
        ->join('types','energies.typ_id','=', 'types.id')
        ->join('model_voitures','types.model_id','=', 'model_voitures.id')
        ->join('marks','model_voitures.mark_id','=', 'marks.id')
         ->select('vehicles.id','vehicles.vehicle_mileage','vehicles.vehicle_price_location','vehicles.created_at','vehicles.status','vehicles.vehicle_price_location','marks.mark_lib','model_voitures.mod_lib')
        ->get();
        return $cmd;
    }
    public function suprimeCar(Request $value)
    {
     
    $var=vehicle::find($value);
   $var->each->delete();
    }

    public function findCar(Request $value)
    {
     
       $var=vehicle::find($value->code);
       return response(['val'=>$var]);
    }
    public function updateCar(Request $value)
    {
        
         $cmd=$value->data;
      
              
        $data=['vehicle_description' => $cmd['vehicule_description'],'vehicle_value' => $cmd['vehicule_value'], 'vehicle_registration' => $cmd['vehicule_immatriculation'],'vehicle_dispo' => $cmd['vehicule_dispo'], 'vehicle_date_next_control' => $cmd['vehicule_date_next_controle'], 'vehicle_adress' => $cmd['vehicule_address'],'vehicle_mileage' => $cmd['vehicule_Kilometrage'],
         'status' => $cmd['status'], 'vehicle_price_location' => $cmd['prixkmjr'],'vehicle_number_insurance' => $cmd['inssurance_number'], 
         'vehicle_date_start_insurance' => $cmd['inssurance_date_start'],
          'vehicle_date_end_insurance' => $cmd['inssurance_date_end'],'nbdoor_id' => $cmd['vehicule_NbrPorte']];
         $var=vehicle::where('id',$value->code)->update($data);
         return $var;
    }
    public function recupimage(Request $value)
    {
     return $value->val;
        
       $data=DB::table('images')->where('id', $value->code)->first();
       
        return response(['reponse'=>$data]);
    }

   
}
