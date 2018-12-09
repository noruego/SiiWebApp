<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DiscountCupon as Cupon;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiscountCuponController extends Controller {
    public function index() {
        
            $cupons = Cupon::all();
            return view('discount_cupon/discount_cupons_list', ['cupons' => $cupons]);
    
    }
    public function store(Request $request)
    {
        $cupon = new Cupon;
        $cupon->name = $request->name;
        $cupon->description = $request->description;
        $cupon->percentage = $request->percentage;
        $cupon->start_date = $request->start_date;
        $cupon->end_date = $request->end_date;
        $cupon->save();
        return redirect('/discount_cupon');
    }
    public function create()
    {
    return view('discount_cupon/discount_cupon_add');
    }
    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('discount_cupon/discount_cupon_update',compact('cupon'));
    }
    public function update(Request $request)
    {
        $cupon = Cupon::find($request->id);
        $cupon->Update($request->all());
        $cupon->percentage=$request->percentage;
        $cupon->save();
        return redirect('/discount_cupon');
    }
    public function delete($id)
    {
        $movie = Cupon::find($id);
        $movie->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $cupon = Cupon::where('name','like','%'.$request->name.'%')->get();
        return \View::make('discount_cupon/discount_cupons_list',['cupons'=>$cupon]);

    }
}
