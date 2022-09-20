<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Createservice;
use App\Http\Requests\RentingRequest;
use App\Services\Showservice;
use App\Services\Indexservice;
use App\Services\Deleteservice;
use App\Models\renting;

class RentingController extends Controller
{
    //
     public $createservice ;
    public $Indexservice;
    public $deleteservice;
    public $showone;

    public function __construct(Createservice $createservice,Showservice $Showservice,Indexservice $Indexservice,Deleteservice $deleteservice,Showservice $showone)
    {
        $this->createservice=$createservice;
        $this->Indexservice=$Indexservice;
        $this->deleteservice=$deleteservice;
        $this->showone=$showone;
    }
  
    public function create(RentingRequest $request)
    {
        //
        $this->createservice->createlocation($request->all());
       
    }

    public function show()
    {
     return $this->Indexservice->indexlocation();
    }

    public function delete($id)
    {
$this->deleteservice->deletelocation($id);
    }
    public function showonelocation($id)
    {
return $this->showone->showlocation($id);
    }
    public function update($id,RentingRequest $request)
    {
      $var=renting::find($id);
      $var->renting_date_departure=$request->renting_date_departure;
      $var->renting_date_return=$request->renting_date_return;
      $var->loc_id=$request->loc_id;
      $var->vehicle_id=$request->vehicle_id;
      renting::create($var);
    }
}
