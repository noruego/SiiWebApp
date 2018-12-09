<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input as Input;
class TeacherController extends Controller
{
    public function index() {
        $_ENV["token"]="c62fa21b324d6bce3b14a91bba16be00";
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsteacher/getTeacher/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $teacher = json_decode($res->getBody(),true);
        $teacher=$teacher['teacher'];
        return view('teacher.teacher_list',compact('teacher')) ;
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
        $teacher ='{
            "email": "'.$request->email.'",
            "father_lastname": "'.$request->father_lastname.'",
            "idcareer": "'.$request->career.'",
            "idstudent": "'.$request->idstudent.'",
            "mother_lastname": "'.$request->mother_lastname.'",
            "name": "'.$request->name.'",
            "image": "'.$image.'",
            "nocontrol": "'.$request->nocontrol.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$teacher,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wsteacher/postTeacher/".config('Settings.token'),$authHeader);
        return redirect('/teacher');
    }
    public function create()
    {
        return view('teacher.teacher_add');
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsteacher/getTeacher/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $teacher = json_decode($res->getBody(),true);
        return view('teacher.teacher_update',compact('teacher','id'));
    }
    public function update(Request $request)
    {
        $teacher  ='{
            "email": "'.$request->email.'",
            "father_lastname": "'.$request->father_lastname.'",
            "idcareer": "'.$request->career.'",
            "idteacher": "'.$request->idteacher.'",
            "mother_lastname": "'.$request->mother_lastname.'",
            "name": "'.$request->name.'",
            "nocontrol": "'.$request->nocontrol.'"
        }';

        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$teacher,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wsteacher/putTeacher/".config('Settings.token'),$authHeader);


        return redirect('/teacher');
    }
    public function delete($id)
    {
        $client = new Client();
        $client->delete("http://localhost:8080/SIIWS_PATM/api/wsteacher/deleteTeacher/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
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
