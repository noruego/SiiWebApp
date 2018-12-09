<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PaymentMethodController extends Controller
{
    public function index() {
        //$payments = PaymentMethod::all();
        $client = new Client();
        $res = $client->get('http://localhost:8080/SIIWS_PATM/api/wsstudent/getStudent/419fe98053b75f0ca1286f54a4615673', ['auth' =>  ['root', 'root']]);
        //echo $res->getBody();
        $respo =json_decode($res->getBody(),true);
        foreach ($respo as $r)
        {
            print_r( $r);
            echo "<br><br><br><br>";
        }
        /*
        $request = new HttpRequest();
        $request->setUrl('http://localhost:8080/SIIWS_PATM/api/wsstudent/getStudent/9600937bcd795c0f267800f5665f0fe4');
        $request->setMethod(HTTP_METH_GET);

        $request->setHeaders(array(
            'postman-token' => '8170dad1-6e07-2f25-479a-b85ab006bfca',
            'cache-control' => 'no-cache',
            'authorization' => 'Basic cm9vdDpyb290'
        ));

        try {
            $response = $request->send();

            echo $response->getBody();
        } catch (HttpException $ex) {
            echo $ex;
        }*/
        die();
        return view('payment_method.payment_methods_list',['payments'=>$payments]) ;
    }
    public function store(Request $request)
    {
        $payment = new PaymentMethod();
        $payment->create($request->all());
        return redirect('/payment_method');
    }
    public function create()
    {
        return view('payment_method.payment_method_add');
    }
    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return view('payment_method.payment_method_update',compact('payment'));
    }
    public function update(Request $request)
    {
        $payment = PaymentMethod::find($request->id);
        $payment->update($request->all());
        return redirect('/payment_method');
    }
    public function delete($id)
    {
        $payment = PaymentMethod::find($id);
        $payment->delete();
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
