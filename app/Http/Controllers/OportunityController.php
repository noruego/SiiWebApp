<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class OportunityController extends Controller
{
    public function index() {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsoportunity/getOportunity/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $oportunity = json_decode($res->getBody(),true);
        $oportunity = $oportunity['oportunidad'];

        return view('oportunity.oportunity_list',compact('oportunity')) ;
    }
    public function store(Request $request)
    {
        $oportunity ='{
            
            "description": "'.$request->description.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$oportunity,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];
        $client = new Client();
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wsoportunity/postOportunity/".config('Settings.token'),$authHeader);

        return redirect('/oportunity');
    }
    public function create()
    {
        return view('oportunity.oportunity_add');
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsoportunity/getOportunity/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $oportunity = json_decode($res->getBody(),true);

        return view('oportunity.oportunity_update',compact('id','oportunity'));
    }
    public function update(Request $request)
    {
        $description =' {
            "description": "'.$request->description.'",
            "idoportunity": "'.$request->idoportunity.'"
        }';
        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$description,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];
        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wsoportunity/putOportunity/".config('Settings.token'),$authHeader);


        return redirect('/oportunity');
    }
    public function delete($id)
    {
        $client = new Client();
        $client->delete("http://localhost:8080/SIIWS_PATM/api/wsoportunity/deleteOportunity/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
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
