<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  public function index()
  {
      return view('login');
  }
  public function login(Request $request)
  {
      $pass=md5($request->pass);
      $login=false;
    $admin= DB::Table('admin')
        ->select('name','pass')
        ->where('pass', '=', $pass)
        ->where('name', '=', $request->name)
        ->get();

    if(sizeof($admin)>0)
    {
        session_start();
        $_SESSION['logueado']=true;
        $login=true;
        return view('index');
    }
    else
    {
        return view('login',compact('login'));
    }
  }
  public function logout()
  {
      return view('login');
  }
}
