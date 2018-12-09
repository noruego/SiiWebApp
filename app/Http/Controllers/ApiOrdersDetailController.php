<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
use Illuminate\Support\Facades\DB;

class ApiOrdersDetailController extends Controller
{
    public function index()
    {
        $state = State::all();
        json_encode($state);
        return $state;
    }

    public function store(Request $request)
    {  
    
    }
   public function show($id)
    {
        $product =DB::table('purchase_order')
            ->join('product','purchase_order.id_product','=','product.id')
            ->join('category','category.id','=','product.id_category')
            ->where('id_product_order','=',$id)
            ->select('product.*','category.name as category')->get();
        for($i=0;$i<sizeof($product);$i++)
        {
            $product[$i]->image="http://".$_SERVER['HTTP_HOST'].'/'.$product[$i]->image;
        }
        return $product;
    }
    public function add($id)
    {
        $product =DB::table('purchase_order')
            ->join('product','purchase_order.id_product','=','product.id')
            ->join('category','category.id','=','product.id_category')
            ->where('id_product_order','=',$id)
            ->select('product.*','category.name as category')->get();
        for($i=0;$i<sizeof($product);$i++)
        {
            $product[$i]->image="http://".$_SERVER['HTTP_HOST'].'/'.$product[$i]->image;
        }
        return $product;
    }
}
