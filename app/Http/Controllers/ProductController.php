<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Provider;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Unish\completeCase;
use Illuminate\Support\Facades\Input as Input;

class ProductController extends Controller {
    public function index() {
        $products = DB::table('product')
            ->join('category', 'product.id_category', '=', 'category.id')
            ->join('provider', 'product.id_provider', '=', 'provider.id')
            ->select('product.id as id_product','product.name as product_name','product.*', 'category.id', 'category.name as category','provider.name as provider','provider.*')
            ->get();
        return view('product/products_list',compact('products')) ;
    }
    public function store(Request $request)
    {
        $dir = 'images/';
        if(Input::hasFile('myfile')){
            $file = Input::file('myfile');
            $file->move($dir, $file->getClientOriginalName());
        }
        $product = new Product();
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_provider = $request->provider;
        $product->image=$dir.$file->getClientOriginalName();
        $product->save();
        return redirect('/product');
    }
    public function create()
    {
        $category = Category::pluck('name','id');
        $provider = Provider::pluck('name','id');
        return view('product/product_add',compact('category','provider'));
    }
    public function edit($id)
    {
        $product  = Product::find($id);
        $category = Category::pluck('name','id');
        $provider = Provider::pluck('name','id');
        return view('product/product_update',compact('product','category','provider'));
    }
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_provider = $request->provider;
        $dir = 'images/';
        if(Input::hasFile('myfile')){
            $file = Input::file('myfile');
            $file->move($dir, $file->getClientOriginalName());
            $product->image=$dir.$file->getClientOriginalName();
        }
        $product->save();
        return redirect('/product');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $products = DB::table('product')
            ->join('category', 'product.id_category', '=', 'category.id')
            ->join('provider', 'product.id_provider', '=', 'provider.id')
            ->where('product.name','like','%'.$request->name.'%')
            ->select('product.id as id_product','product.name as product_name','product.*', 'category.id', 'category.name as category','provider.name as provider','provider.*')
            ->get();
        return \View::make('product/products_list',compact('products'));

    }
    public function image()
    {
        $dir = '../../../images/';

        if ($_FILES['myfile']["error"] > 0) {
            echo "Error: " . $_FILES['myfile']['error'] . "<br>";
        } else {
            /* Datos del archivo
            echo "Nombre: " . $_FILES['myfile']['name'] . "<br>";
            echo "Tipo: " . $_FILES['myfile']['type'] . "<br>";
            echo "Tamaño: " . ($_FILES["myfile"]["size"] / 1024) . " kB<br>";
            echo "Carpeta temporal: " . $_FILES['myfile']['tmp_name'];
            */
            /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/

            if (move_uploaded_file($_FILES['myfile']['tmp_name'], $dir . $_FILES['myfile']['name']))
                echo('se ha agregado el archivo correctamente');
            else
                echo('No se ha podido agregar el archivo');

        }
    }
}
