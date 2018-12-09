@extends('welcome')

<html>
<head>
    <title>Detalles de la order de compra</title>

</head>
@section('list')
<body>
@foreach($product_order as $product)
    <div class="container">
        <div class='panel panel-success'>
            <div class='panel-heading'>Detalles de la compra</div>
            <div class='panel-body'>Fecha: {{ $product->order_date }}
                <br> Cantidad: {{ $product->quantity }}
                <br> Metodo de pago: {{ $product->payment_method }}
                <br> Descripcion: {{ $product->order_description }}
                <br> Total: {{ $product->total }}
                <br></div>
            <div class='panel panel-success'>
                <div class='panel-heading'>Detalles de envio</div>
                <div class='panel-body'>Nombre: {{$ship->ship}}
                    <br> Email: {{$ship->email}}
                    <br> Telefono: {{ $ship->phone }}
                    <br> Direccion: {{ $ship->address }}
                    <br> Ciudad: {{ $ship->city }}
                    <br> Estado: {{ $ship->state }}
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
    @endforeach
    <div class="container">
        Productos comprados
        <table>
            @foreach($purchase_order as $purchase)
                <tr>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>{{ $purchase->name }}</div>
                        <div class='panel-body'>Marca: {{ $purchase->brand }}
                            <br> Modelo: {{ $purchase->model }}
                            <br> Precio: {{ $purchase->price }}
                            <br></div>
                    </div>
                </tr>
            @endforeach
        </table>
    </div>
</body>
    @stop
</html>
