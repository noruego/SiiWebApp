@extends('welcome')

<html>
<head>
    <title>Lista de productos</title>

</head>

<body>

<div class="container">
    <br><br><br><br><br><br>
    <div class="row">
        {!! Form::open(['route' => '/product/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Marca</label>
            <input type="text" class="form-control" name = "name" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('product.index') }}" class="btn btn-ouline-primary">Todos</a>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Provedor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ $product->image }}"><img src='{{ $product->image  }} ' width="50" height="50"></a></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->provider }}</td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="{{ route('product.edit',['id' => $product->id_product] )}}" >Editar</a>
                        <a class="btn btn-danger btn-xs" href="{{ route('/product/delete',['id' => $product->id_product] )}}" >Eliminar</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
