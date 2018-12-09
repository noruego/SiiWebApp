@extends('welcome')

<html>
<head>
    <title>Detalles las ordenes de compra</title>
</head>
@section('list')
    <body>
    <?php $num=1;?>
    <h3>Detalles de las compras realizadas entre {{$start}} y {{$end}}</h3>
    @if($product_order)
        @foreach($product_order as $product)
            <div class="container">
                <div class='panel panel-success'>
                    <div class='panel-heading'>Detalles de la compra numero {{ $num }}
                        <br> Cliente {{ $product->users }}
                    </div>
                    <div class='panel-body'>Fecha: {{ $product->order_date }}
                        <br> Cantidad: {{ $product->quantity }}
                        <br> Metodo de pago: {{ $product->payment_method }}
                        <br> Descripcion: {{ $product->order_description }}
                        <br> Total: {{ $product->total }}
                        <br></div>
                    <div class='panel panel-success'>
                        <div class='panel-heading'>Detalles de envio</div>
                        <div class='panel-body'>Nombre: {{$product->ship}}
                            <br> Email: {{$product->email}}
                            <br> Telefono: {{ $product->phone }}
                            <br> Direccion: {{ $product->address }}
                            <br> Ciudad: {{ $product->city }}
                            <br> Estado: {{ $product->state }}
                            <br></div>
                    </div>
                    <div class='panel panel-success'>
                        <div class='panel-heading'>Cupon de descuento</div>
                        <div class='panel-body'>Cupon: {{ $product->cupon }}
                            <br> Porcentaje: {{ $product->percentage }}
                            <br></div>
                    </div>
                </div>
            </div>
            <div class="container">
                Productos comprados
                <table>
                    @foreach($purchase_order[$num-1] as $purchase)
                        <div class='panel panel-primary'>
                            <div class='panel-heading'>{{ $purchase->name }}</div>
                            <div class='panel-body'>Marca: {{ $purchase->brand }}
                                <br> Modelo: {{ $purchase->model }}
                                <br> Precio: {{ $purchase->price }}
                                <br></div>
                        </div>
                    @endforeach
                </table>

            </div>
            <?php $num=$num+1;?>
        @endforeach
    @endif
    @if(!empty($product_order))
        No hay productos en la fecha
    @endif
    </body>
@stop
</html>
