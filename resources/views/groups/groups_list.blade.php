@extends('welcome')
<html>
<head>
    <title>Lista de grupos</title>
</head>

<body>
@section('list')
<div class="container">
    <div class="row">
        {!! Form::open(['route' => '/groups/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "name" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('groups.index') }}" class="btn btn-outline-primary">Todos</a>
        <a href="{{ route('groups.create') }}" class="btn btn-outline-success">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombre de la materia</th>
                <th>Profesor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group['matter']['name'] }}</td>
                    <td>{{ $group['teacher']['name'].' '.$group['teacher']['father_lastname'].' '.$group['teacher']['mother_lastname'] }}</td>
                    <td>
                      <a class="btn btn-outline-primary btn-xs" href="{{ route('groups.edit',['id' => $group['idGroup']] )}}" >Editar</a>
                        <a class="btn btn-outline-danger btn-xs" href="{{ route('/groups/delete',['id' => $group['idGroup']] )}}" >Eliminar</a>
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
