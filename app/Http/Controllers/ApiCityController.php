<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class ApiCityController extends Controller
{
    //
    public function index()
    {
        $city = City::all();
        json_encode($city);
        return $city;
    }

    public function show($id)
    {
        $city = City::find($id);
        return $city;
    }
}
