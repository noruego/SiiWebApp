<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MatterController extends Controller
{
    public function index() {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsmateria/getMaterias/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $matter = json_decode($res->getBody(),true);
        $matter = $matter['matter'];

        return view('matter.matter_list',compact('matter')) ;
    }
    public function store(Request $request)
    {
        $matter ='{
            "name": "'.$request->name.'"
        }';
        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$matter,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wsmateria/postMaterias/".config('Settings.token'),$authHeader);

        return redirect('/matter');
    }
    public function create()
    {
        return view('matter.matter_add');
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsmateria/getMaterias/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $matter = json_decode($res->getBody(),true);

        return view('matter.matter_update',compact('matter','id'));
    }
    public function update(Request $request)
    {
        $matter ='{
            "keymatter": "'.$request->keymatter.'",
            "name": "'.$request->name.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$matter,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wsmateria/putMaterias/".config('Settings.token'),$authHeader);


        return redirect('/matter');
    }
    public function delete($id)
    {
        $client = new Client();
        $client->delete("http://localhost:8080/SIIWS_PATM/api/wsmateria/deleteMateria/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        return redirect()->back();
    }
    public function search(Request $request){
        $payments = PaymentMethod::where('name','like','%'.$request->name.'%')->get();
        return \View::make('payment_method.payment_methods_list',['payments'=>$payments]);
    }
    public function service()
    {

    }
}
