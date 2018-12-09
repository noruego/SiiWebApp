<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input as Input;
class StudentController extends Controller
{
    public function index() {
        $_ENV["token"]="c62fa21b324d6bce3b14a91bba16be00";
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsstudent/getStudent/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $students = json_decode($res->getBody(),true);
        $students=$students['student'];

        return view('student.student_list',compact('students')) ;
    }
    public function store(Request $request)
    {
        $dir = 'images/';
        $image='';
        if(Input::hasFile('myfile')){
            $file = Input::file('myfile');
            $file->move($dir, $file->getClientOriginalName());
            $image=$dir.$file->getClientOriginalName();
            echo $image;
        }
        $student ='{
            "career": {
                "careerId": "'.$request->career.'",
                "name": "Carrera"
            },
            "email": "'.$request->email.'",
            "father_lastname": "'.$request->father_lastname.'",
            "idcareer": "'.$request->career.'",
            "idstudent": "'.$request->idstudent.'",
            "mother_lastname": "'.$request->mother_lastname.'",
            "name": "'.$request->name.'",
            "image": "'.config('Settings.host').$image.'",
            "nocontrol": "'.$request->nocontrol.'"
        }';

        //print_r($student);
        //die();
        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$student,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wsstudent/postStudent/".config('Settings.token'),$authHeader);
        return redirect('/student');
    }
    public function create()
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wscareer/getcareer/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $carrera = json_decode($res->getBody(),true);
        $carrera = $carrera['career'];
        return view('student.student_add',compact('carrera'));
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsstudent/getStudent/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $student = json_decode($res->getBody(),true);
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wscareer/getcareer/".config('Settings.token'), ['auth' =>  ['root', 'root']]);

        $carrera = json_decode($res->getBody(),true);
        $carrera = $carrera['career'];
        return view('student.student_update',compact('student','carrera','id'));
    }
    public function update(Request $request)
    {
        $dir = 'images/';
        $image='';
        if(Input::hasFile('myfile')){
            $file = Input::file('myfile');
            $file->move($dir, $file->getClientOriginalName());
            $image=$dir.$file->getClientOriginalName();
            echo $image;
        }
        $student ='{
            "career": {
                "careerId": "'.$request->career.'",
                "name": "Carrera"
            },
            "email": "'.$request->email.'",
            "father_lastname": "'.$request->father_lastname.'",
            "idcareer": "'.$request->career.'",
            "idstudent": "'.$request->idstudent.'",
            "mother_lastname": "'.$request->mother_lastname.'",
            "name": "'.$request->name.'",
             "image": "'.config('Settings.host').$image.'",
            "nocontrol": "'.$request->nocontrol.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$student,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wsstudent/putStudent/".config('Settings.token'),$authHeader);


        return redirect('/student');
    }
    public function delete($id)
    {
        $client = new Client();
        $client->delete("http://localhost:8080/SIIWS_PATM/api/wsstudent/deleteStudent/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
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
