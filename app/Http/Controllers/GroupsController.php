<?php

namespace App\Http\Controllers;
use App\PaymentMethod;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input as Input;
class GroupsController extends Controller
{
    public function index() {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsgrupos/getgrupos/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $groups = json_decode($res->getBody(),true);
        $groups=$groups['kardex'];
        return view('groups.groups_list',compact('groups')) ;
    }
    public function store(Request $request)
    {
        $student ='{
                "idGroup": "",
                "matter": {
                    "keymatter": "'.$request->matter.'",
                    "name": "Fundamentos de bases de datos"
                },
                "teacher": {
                    "email": "jesus@mail.com",
                    "father_lastname": "Sanchez",
                    "idTeacher": "3",
                    "iddepartment": "0",
                    "idteacher": "'.$request->idteacher.'",
                    "mother_lastname": "Farias",
                    "name": "Jose Jesus",
                    "nocontrol": "12342367"
                }
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
        $response = $client->post("http://localhost:8080/SIIWS_PATM/api/wsgrupos/postgrupo/".config('Settings.token'),$authHeader);
        return redirect('/groups');
    }
    public function create()
    {
        //get teachers
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsteacher/getTeacher/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $teacher = json_decode($res->getBody(),true);
        $teacher=$teacher['teacher'];


        //get matters
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsmateria/getMaterias/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $matter = json_decode($res->getBody(),true);
        $matter = $matter['matter'];

        return view('groups.groups_add',compact('teacher','matter'));
    }
    public function edit($id)
    {
        $client = new Client();
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsteacher/getTeacher/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $teacher = json_decode($res->getBody(),true);
        $teacher=$teacher['teacher'];

        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsgrupos/getgrupo/$id/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $groups = json_decode($res->getBody(),true);
        $groups_sele=$groups['kardex'];

        //get matters
        $res = $client->get("http://localhost:8080/SIIWS_PATM/api/wsmateria/getMaterias/".config('Settings.token'), ['auth' =>  ['root', 'root']]);
        $matter = json_decode($res->getBody(),true);
        $matter = $matter['matter'];



        return view('groups.groups_update',compact('teacher','matter','id','groups_sele'));
    }
    public function update(Request $request)
    {
        $student ='{
                "idGroup": "'.$request->idgroup.'",
                "matter": {
                    "keymatter": "'.$request->matter.'",
                    "name": "Fundamentos de bases de datos"
                },
                "teacher": {
                    "email": "jesus@mail.com",
                    "father_lastname": "Sanchez",
                    "idTeacher": "3",
                    "iddepartment": "0",
                    "idteacher": "'.$request->idteacher.'",
                    "mother_lastname": "Farias",
                    "name": "Jose Jesus",
                    "nocontrol": "12342367"
                }
        }';
        print_r($student);
        $authHeader = [
            'auth'    =>['root', 'root'],
            'body'    =>$student,
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
        ];

        $client = new Client();
        $response = $client->put("http://localhost:8080/SIIWS_PATM/api/wsgrupos/putgrupos/".config('Settings.token'),$authHeader);


        return redirect('/groups');
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
