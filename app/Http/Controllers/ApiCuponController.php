<?php

namespace App\Http\Controllers;
use App\DiscountCupon;
use Illuminate\Http\Request;

class ApiCuponController extends Controller
{
    public function index()
    {
        $cupon= DiscountCupon::all();
        json_encode($cupon);
        return $cupon;
    }
    public function store(Request $request)
    {
        $cupon = new Cupon();
        $cupon->nombre = $request->nombre;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->save();
    }
    public function show($id)
    {
        $cupon = Cupon::find($id);
        return $cupon;
    }
    public function delete(Request $request,$id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->delete();
    }
    public function update(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->update($request->all());
        return $cupon;
    }
}
