<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Ship;
use App\ProductOrder;
use App\Category;
use App\Provider;
use DB;
use App\Http\Requests;
use Graphics;

class ReportProductController extends Controller {
    public function index() {
        $client =DB::table('customer')
        ->join('users','customer.id_user','=','users.id')
        ->select('users.name as name','customer.id as id')
        ->get();

        return view('reports/client_reports',compact('client')) ;
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
    public function search($id)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('ship', 'product_order.id_ship', '=', 'ship.id')
            ->join('city', 'ship.id_city', '=', 'city.id')
            ->join('state', 'ship.id_state', '=', 'state.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->where('product_order.id_customer','=',$id)
            ->select('product_order.id as id_product_order', 'product_order.*', 'ship.*', 'users.*', 'discount_cupon.*', 'payment_method.*'
                , 'discount_cupon.name as cupon', 'payment_method.name as payment_method', 'product_order.description as order_description'
                , 'ship.name as ship', 'ship.*', 'state.*', 'state.name as state', 'city.*', 'city.name as city'
                , 'users.name as users'
            )->get();
        foreach ($product_order as $p) {
            $purchase_order[] = DB::table('purchase_order')
                ->join('product', 'purchase_order.id_product', '=', 'product.id')
                ->where('purchase_order.id_product_order', '=', $p->id_product_order)
                ->select('product.*', 'product.name as product ')->get();
        }
        return view('reports.client_report_detail',compact('product_order','purchase_order','ship','id'));
    }
    public function show($id)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('ship', 'product_order.id_ship', '=', 'ship.id')
            ->join('city', 'ship.id_city', '=', 'city.id')
            ->join('state', 'ship.id_state', '=', 'state.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->select('product_order.id as id_product_order', 'product_order.*', 'ship.*', 'users.*', 'discount_cupon.*', 'payment_method.*'
                , 'discount_cupon.name as cupon', 'payment_method.name as payment_method', 'product_order.description as order_description'
                , 'ship.name as ship', 'ship.*', 'state.*', 'state.name as state', 'city.*', 'city.name as city'
                , 'users.name as users'
            )->get();
        foreach ($product_order as $p) {
            $purchase_order[] = DB::table('purchase_order')
                ->join('product', 'purchase_order.id_product', '=', 'product.id')
                ->where('purchase_order.id_product_order', '=', $p->id_product_order)
                ->select('product.*', 'product.name as product ')->get();
        }
        return view('reports.client_report_detail_all',compact('product_order','purchase_order','id'));
    }
    public function show_pdf()
    {
        print ('entro al pdf');
        die();
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('ship', 'product_order.id_ship', '=', 'ship.id')
            ->join('city', 'ship.id_city', '=', 'city.id')
            ->join('state', 'ship.id_state', '=', 'state.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->select('product_order.id as id_product_order', 'product_order.*', 'ship.*', 'users.*', 'discount_cupon.*', 'payment_method.*'
                , 'discount_cupon.name as cupon', 'payment_method.name as payment_method', 'product_order.description as order_description'
                , 'ship.name as ship', 'ship.*', 'state.*', 'state.name as state', 'city.*', 'city.name as city'
                , 'users.name as users'
            )->get();
        foreach ($product_order as $p) {
            $purchase_order[] = DB::table('purchase_order')
                ->join('product', 'purchase_order.id_product', '=', 'product.id')
                ->where('purchase_order.id_product_order', '=', $p->id_product_order)
                ->select('product.*', 'product.name as product ')->get();
        }
        $view=view('reports.client_report_detail_all',compact('product_order','purchase_order','id'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream("Reporte de todas las compras.pdf");
    }
    public function search_pdf($id)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('ship', 'product_order.id_ship', '=', 'ship.id')
            ->join('city', 'ship.id_city', '=', 'city.id')
            ->join('state', 'ship.id_state', '=', 'state.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->where('product_order.id_customer','=',$id)
            ->select('product_order.id as id_product_order', 'product_order.*', 'ship.*', 'users.*', 'discount_cupon.*', 'payment_method.*'
                , 'discount_cupon.name as cupon', 'payment_method.name as payment_method', 'product_order.description as order_description'
                , 'ship.name as ship', 'ship.*', 'state.*', 'state.name as state', 'city.*', 'city.name as city'
                , 'users.name as users'
            )->get();
        foreach ($product_order as $p) {
            $purchase_order[] = DB::table('purchase_order')
                ->join('product', 'purchase_order.id_product', '=', 'product.id')
                ->where('purchase_order.id_product_order', '=', $p->id_product_order)
                ->select('product.*', 'product.name as product ')->get();
        }
        $view=view('reports.pdf_client_report_detail',compact('product_order','purchase_order','ship'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($product_order[0]->users.$product_order[0]->order_date.".pdf");
    }
    public function graphics()
    {
        $enero = DB::table('product_order')
            ->whereBetween('order_date',array('2017-1-01','2017-1-31'))
            ->count();
        $febrero = DB::table('product_order')
            ->whereBetween('order_date',array('2017-2-01','2017-2-28'))
            ->count();
        $marzo = DB::table('product_order')
            ->whereBetween('order_date',array('2017-3-01','2017-3-30'))
            ->count();
        $abril = DB::table('product_order')
            ->whereBetween('order_date',array('2017-4-01','2017-4-30'))
            ->count();
        $mayo = DB::table('product_order')
            ->whereBetween('order_date',array('2017-5-01','2017-5-30'))
            ->count();
        $junio = DB::table('product_order')
            ->whereBetween('order_date',array('2017-6-01','2017-6-30'))
            ->count();
        $julio = DB::table('product_order')
            ->whereBetween('order_date',array('2017-7-01','2017-7-30'))
            ->count();
        $agosto = DB::table('product_order')
            ->whereBetween('order_date',array('2017-8-01','2017-8-30'))
            ->count();
        $septiembre = DB::table('product_order')
            ->whereBetween('order_date',array('2017-9-01','2017-9-30'))
            ->count();
        $octubre = DB::table('product_order')
            ->whereBetween('order_date',array('2017-10-01','2017-10-30'))
            ->count();
        $noviembre = DB::table('product_order')
            ->whereBetween('order_date',array('2017-11-01','2017-11-30'))
            ->count();
        $diciembre = DB::table('product_order')
            ->whereBetween('order_date',array('2017-12-01','2017-12-30'))
            ->count();
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'])
            ->datasets([
                [
                    "label" => "Numero de ventas por año",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$enero, $febrero, $marzo, $abril, $mayo, $junio, $julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre],
                ],
            ])
            ->options([]);

        return view('reports.graphics', compact('chartjs'));
    }
    public function orders()
    {
        return view('reports.orders');
    }
    public function orders_search(Request $request)
    {
        $product_order = DB::table('product_order')
            ->join('customer', 'product_order.id_customer', '=', 'customer.id')
            ->join('ship', 'product_order.id_ship', '=', 'ship.id')
            ->join('city', 'ship.id_city', '=', 'city.id')
            ->join('state', 'ship.id_state', '=', 'state.id')
            ->join('users', 'customer.id_user', '=', 'users.id')
            ->join('discount_cupon', 'product_order.id_discount_cupon', '=', 'discount_cupon.id')
            ->join('payment_method', 'product_order.id_payment_method', '=', 'payment_method.id')
            ->select('product_order.id as id_product_order', 'product_order.*', 'ship.*', 'users.*', 'discount_cupon.*', 'payment_method.*'
                , 'discount_cupon.name as cupon', 'payment_method.name as payment_method', 'product_order.description as order_description'
                , 'ship.name as ship', 'ship.*', 'state.*', 'state.name as state', 'city.*', 'city.name as city'
                , 'users.name as users'
            )
            ->whereBetween('product_order.order_date',array($request->start_date,$request->end_date))
            ->get();
        foreach ($product_order as $p) {
            $purchase_order[] = DB::table('purchase_order')
                ->join('product', 'purchase_order.id_product', '=', 'product.id')
                ->where('purchase_order.id_product_order', '=', $p->id_product_order)
                ->select('product.*', 'product.name as product ')->get();
        }
        $start=$request->start_date;
        $end=$request->end_date;
        return view('reports.order_details', compact('product_order','purchase_order','start','end'));
    }
}