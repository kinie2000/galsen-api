<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\renting;
class Authservice
{
  public function createlocation(array $values)
  {
    return renting::create($values);
  }

}