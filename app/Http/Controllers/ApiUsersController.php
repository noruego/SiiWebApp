<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class ApiUsersController extends Controller
{
    public function index()
    {
        $state = State::all();
        json_encode($state);
        return $state;
    }

    public function store(Request $request)
    {
        $pass=md5($request->pasword);
        //$content = $this->get("request")->getContent();
                $user= DB::Table('users')
                    ->select('name','password')
                    ->where('password', '=', $request->password)
                    ->where('name', '=', $request->name)
                    ->select('users.*')
                    ->get();
        return $user;
    }
    public function show($id)
    {
        //$content = $this->get("request")->getContent();
        $user= DB::Table('users')
            ->select('name','password')
            ->where('id', '=', $id)
            ->select('users.*')
            ->get();
        return $user;
    }
    public function store2(Request $request)
        { $login=false;
            //$content = $this->get("request")->getContent();
            $content = $request->getContent();
            if (!empty($content))
            {
                $objData = json_decode($content, false);
                try{
                    $user= DB::Table('users')
                        ->select('name','password')
                        ->where('password', '=', $objData[0]->password)
                        ->where('name', '=', $objData[0]->name)
                        ->get();
                    if(sizeof($user)>0)
                    {
                        $login=true;
                    }
                }catch (Exception $e){
    //$e->getMessage();
                    return array("error1" + $e->getMessage());
                } catch (ORMException $e1) {
    //$e1->getMessage();
                    return array("error2" + $e1->getMessage());
                } catch (DBALException $e2) {
    //$e2->getMessage();
                    return array("error3" + $e2->getMessage());
                }
            }
            if($login)
                return array('true');
            else
                return array('false');
        }
}
