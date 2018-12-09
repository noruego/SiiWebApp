<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class CareerController extends Controller
{
    public function index() {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wscareer/getcareer/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $career = json_decode($res->getBody(),true);
        $career = $career['career'];

        return view('career.career_list',compact('career')) ;
    }
    public function store(Request $request)
    {
        $career ='{
            "name": "'.$request->name.'"
        }';
        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$career,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wscareer/postcareer/".config('Settings.token'),$authHeader);

        return redirect('/career');
    }
    public function create()
    {
        return view('career.career_add');
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wscareer/getcareer/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $career = json_decode($res->getBody(),true);

        return view('career.career_update',compact('career','id'));
    }
    public function update(Request $request)
    {
        $career ='{
            "idcareer": "'.$request->idcareer.'",
            "name": "'.$request->name.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$career,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wscareer/putcareer/".config('Settings.token'),$authHeader);


        return redirect('/career');
    }
    public function delete($id)
    {
        $client = new Client();
        $client->delete("http://localhost:8080/SIIWS_PATM/api/wscareer/deletecareer/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
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
