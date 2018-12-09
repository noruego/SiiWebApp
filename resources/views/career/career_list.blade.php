@extends('welcome')
<html>
<head>
    <title>Lista de metodos de pago</title>
</head>

<body>
@section('list')
<div class="container">
    <div class="row">
        {!! Form::open(['route' => '/career/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "name" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('career.index') }}" class="btn btn-outline-primary">Todos</a>
        <a href="{{ route('career.create') }}" class="btn btn-outline-success">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($career as $career)
                <tr>
                    <td>{{ $career['name'] }}</td>
                    <td>
                      <a class="btn btn-outline-primary btn-xs" href="{{ route('career.edit',['id' => $career['idcareer']] )}}" >Editar</a>
                        <a class="btn btn-outline-danger btn-xs" href="{{ route('/career/delete',['id' => $career['idcareer']] )}}" >Eliminar</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    @stop
</body>
</html>
