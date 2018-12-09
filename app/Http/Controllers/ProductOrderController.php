<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Ship;
use App\Category;
use App\Provider;
use DB;
use App\Http\Requests;

class ProductOrderController extends Controller {
    public function index() {
        $product_orders = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('payment_method','product_order.id_payment_method','=','payment_method.id')
            ->select('product_order.id as id_product_order','product_order.*','payment_method.name as payment_method','users.name as customer','product_order.*')
            ->get();
        return view('product_order/product_orders_list',compact('product_orders')) ;
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_provider = $request->provider;
        $product->save();
        return redirect('/product');
    }
    public function create()
    {
        $category =Category::pluck('name','id');
        $provider =Provider::pluck('name','id');
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
            ->select('product.id as id_product','product.*', 'category.id', 'category.name as category','provider.name as provider','provider.*')
            ->get();
        return \View::make('product/products_list',compact('products'));
    }
    public function detail($id)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->where('product_order.id','=',$id)
            ->select('product_order.id as id_product_order','product_order.*','users.*','discount_cupon.*','payment_method.*'
            ,'discount_cupon.name as cupon','payment_method.name as payment_method','product_order.description as order_description')
            ->get();
        foreach ($product_order as $p)
        {
            $ship = DB::table('ship')
                ->join('city','ship.id_city','=','city.id')
                ->join('state','ship.id_state','=','state.id')
                ->select('ship.name as ship','ship.*','state.*','state.name as state','city.*','city.name as city')
                ->where('ship.id','=',$p->id_ship)
                ->get();
        }
        $ship=$ship->first();

        $purchase_order =DB::table('purchase_order')
            ->join('product','purchase_order.id_product','=','product.id')
            ->where('id_product_order','=',$id)
            ->select('product.*')->get();
        return view('product_order/product_order_detail',compact('product_order','purchase_order','ship'));
    }
}