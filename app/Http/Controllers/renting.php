<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Createservice;
use App\Http\Requests\RentingRequest;
use App\Services\Findservice;
use App\Services\Indexservice;


class renting extends Controller
{
    public $createservice ;
    public $Indexservice;
    public $findservice;

    public function __construct(Createservice $createservice,Findservice $findservice,Indexservice $Indexservice)
    {
        $this->createservice=$createservice;
        $this->Indexservice=$Indexservice;
        $this->findservice=$findservice;
    }
  
    public function create(RentingRequest $request)
    {
        //
        $this->createservice->createlocation($request->all());
       
    }

    public function index()
    {
      $this->Indexservice->indexlocation(); 
    }

    public function find()
    {

    }


}
