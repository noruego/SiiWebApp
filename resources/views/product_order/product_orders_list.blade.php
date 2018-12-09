@extends('welcome')

<html>
<head>
    <title>Lista de ordenes de compra</title>

</head>

<body>

<div class="container">
    <br><br><br><br><br><br>
    <div class="row">
        {!! Form::open(['route' => '/product_order/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Marca</label>
            <input type="text" class="form-control" name = "marca" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('product_order.index') }}" class="btn btn-outline-primary">Todos</a>
        <a href="{{ route('product_order.create') }}" class="btn btn-primary">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_orders as $product_order)
                <tr>
                    <td>{{ $product_order->customer }}</td>
                    <td>{{ $product_order->order_date }}</td>
                    <td>{{ $product_order->payment_method }}</td>
                    <td>{{ $product_order->total }}</td>
                    <td>
                        <a class="btn btn-outline-primary btn-xs" href="{{ route('/product_order/detail',['id' => $product_order->id_product_order] )}}" >Detalles</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
