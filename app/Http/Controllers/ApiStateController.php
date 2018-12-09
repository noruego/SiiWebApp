<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\StaticCall;

class ApiStateController extends Controller
{
    //
    public function index()
    {
        $state = State::all();
        json_encode($state);
        return $state;
    }

    public function show($id)
    {
        $state = State::find($id);
        return $state;
    }
}
