@extends('welcome')
<html>
<head>
    <title>Lista de maestros</title>
</head>

<body>
@section('list')
<div class="container">
    <div class="row">
        {!! Form::open(['route' => '/teacher/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "name" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('teacher.index') }}" class="btn btn-outline-primary">Todos</a>
        <a href="{{ route('teacher.create') }}" class="btn btn-outline-success">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Nombre Materno</th>
                <th>Correo</th>
                <th>No control</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teacher as $teacher)
                <tr>
                    <td>{{ $teacher['name'] }}</td>
                    <td>{{ $teacher['father_lastname'] }}</td>
                    <td>{{ $teacher['mother_lastname'] }}</td>
                    <td>{{ $teacher['email'] }}</td>
                    <td>{{ $teacher['nocontrol'] }}</td>

                    <td>
                      <a class="btn btn-outline-primary btn-xs" href="{{ route('teacher.edit',['id' => $teacher['idteacher']] )}}" >Editar</a>
                        <a class="btn btn-outline-danger btn-xs" href="{{ route('/teacher/delete',['id' => $teacher['idteacher']] )}}" >Eliminar</a>
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
