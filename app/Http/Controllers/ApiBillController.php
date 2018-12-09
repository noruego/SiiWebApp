<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiBillController extends Controller
{
    //
    public function index()
    {
        $bill = Bill::all();
        json_encode($bill);
        return $bill;
    }

    public function show($id)
    {
        $bill= DB::Table('bill')
            ->join('customer','bill.id_customer','=','customer.id')
            ->join('users','customer.id_user','=','users.id')
            ->join('city','bill.id_city','=','city.id')
            ->join('state','bill.id_state','=','state.id')
            ->select('name','password')
            ->where('bill.id_customer','=',$id)
            ->select('bill.*','users.*','customer.*','city.name as city','state.name as state')
            ->get();
        return $bill;
    }

    public function update(Request $request, $id)
    {
        $bill = Provider::find($id);
        $bill->name     = $request->name;
        $bill->rfc      = $request->email;
        $bill->phone    = $request->phone;
        $bill->email    = $request->id_city;
        $bill->address  = $request->address;
        $bill->id_country  = $request->id_country;
        $bill->save();
    }

    public function destroy($id)
    {
        $bill = Provider::find($id);
        $bill->delete();
    }

    public function store(Request $request)
    {
        $bill = Provider();
        $bill->name = $request->name;
        $bill->save();
    }
}
