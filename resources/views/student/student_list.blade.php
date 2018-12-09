@extends('welcome')
<html>
<head>
    <title>Lista de metodos de pago</title>
</head>

<body>
@section('list')
<div class="container">
    <div class="row">
        {!! Form::open(['route' => '/student/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "name" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('student.index') }}" class="btn btn-outline-primary">Todos</a>
        <a href="{{ route('student.create') }}" class="btn btn-outline-success">Agregar</a>
        <br>
        {!! Form::close() !!}
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Nombre Materno</th>
                <th>Correo</th>
                <th>No control</th>
                <th>Carrera</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td><a href="{{ $student['image'] }}"><img src='{{ $student['image']  }} ' width="50" height="50"></a></td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['father_lastname'] }}</td>
                    <td>{{ $student['mother_lastname'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>{{ $student['nocontrol'] }}</td>
                    <td>{{ $student['career']['name'] }}</td>
                    <td>
                      <a class="btn btn-outline-primary btn-xs" href="{{ route('student.edit',['id' => $student['idstudent']] )}}" >Editar</a>
                        <a class="btn btn-outline-danger btn-xs" href="{{ route('/student/delete',['id' => $student['idstudent']] )}}" >Eliminar</a>
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
