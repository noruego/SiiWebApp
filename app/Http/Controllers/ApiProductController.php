<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::all();
        for($i=0;$i<sizeof($product);$i++)
        {
            $product[$i]->image="http://".$_SERVER['HTTP_HOST'].'/'.$product[$i]->image;
        }
        json_encode($product);
        return $product;
    }

    public function show($id)
    {
         $product = Product::find($id);
         return  $product;
    }

    public function store(Request$request)
    {
        $product = Product();
        $product->brand = $request->brand;
        $product->save();
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->price   = $request->price;
        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
