<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\prolongationRequest ;
use App\Models\renting;
use App\Models\prolongation;

class ProlongationController extends Controller
{
    //
    public function makeprolongation($id,prolongationRequest $RentingRequest)
    {
$var=renting::find($id);
$var->id;
prolongation::create($RentingRequest->all());
    }
}
