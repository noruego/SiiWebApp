<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ApiProviderController extends Controller
{
    //
    public function index()
    {
        $provider = Provider::all();
        json_encode($provider);
        return $provider;
    }

    public function show($id)
    {
        $provider = Provider::find($id);
        return $provider;
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        $provider->name     = $request->name;
        $provider->rfc      = $request->rfc;
        $provider->phone    = $request->phone;
        $provider->email    = $request->email;
        $provider->address  = $request->address;
        $provider->save();
    }

    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
    }

    public function store(Request $request)
    {
        $provider = Provider();
        $provider->name = $request->name;
        $provider->save();
    }

}
