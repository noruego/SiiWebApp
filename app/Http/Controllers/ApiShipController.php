<?php

namespace App\Http\Controllers;

use App\Ship;
use Illuminate\Http\Request;

class ApiShipController extends Controller
{
    //
    public function index()
    {
        $ship = Ship::all();
        json_encode($ship);
        return $ship;
    }

    public function show($id)
    {
        $ship = Provider::find($id);
        return $ship;
    }

    public function update(Request $request, $id)
    {
        $ship = Provider::find($id);
        $ship->name     = $request->name;
        $ship->rfc      = $request->rfc;
        $ship->phone    = $request->phone;
        $ship->email    = $request->email;
        $ship->address  = $request->address;
        $ship->save();
    }

    public function destroy($id)
    {
        $ship = Provider::find($id);
        $ship->delete();
    }

    public function store(Request $request)
    {
        $ship = Provider();
        $ship->name = $request->name;
        $ship->save();
    }
}
