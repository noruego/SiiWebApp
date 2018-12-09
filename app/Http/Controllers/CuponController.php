<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cupon;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuponController extends Controller {
    public function index() {
        if($_SESSION['loggeado']) {
            $cupons = Cupon::all();
            return view('cupons_list', ['cupons' => $cupons]);
        }
        else
            echo 'No tiene permisos';
    }
    public function store(Request $request)
    {
        $cupon = new Cupon;
        $cupon->nombre = $request->nombre;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->save();
        return redirect('/cupon');
    }
    public function create()
    {
    return view('cupon_add');
    }
    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('cupon_update',compact('cupon'));
    }
    public function update(Request $request)
    {
        $cupon = Cupon::find($request->id);
        $cupon->nombre = $request->nombre;
        $cupon->porcentaje = $request->porcentaje;
        $cupon->save();
        return redirect('/cupon');
    }
    public function delete($id)
    {
        $movie = Cupon::find($id);
        $movie->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $cupon = Cupon::where('nombre','like','%'.$request->name.'%')->get();
        return \View::make('cupons_list',['cupons'=>$cupon]);

    }
    public function logged()
    {
        if($_SESSION['loggeado'])
            return true;
        else
            return false;

    }
}