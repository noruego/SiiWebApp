<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;

class ApiPaymentController extends Controller
{
    //
    public function index()
    {
        $payment = PaymentMethod::all();
        json_encode($payment);
        return $payment;
    }

    public  function show($id)
    {
        $payment = Payment::find($id);
        return $payment;
    }
}
