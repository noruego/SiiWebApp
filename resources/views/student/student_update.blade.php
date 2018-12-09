@extends('welcome')
@section('update')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($student,array('route' =>['student.update',$student['idstudent']],'method'=>'PUT','enctype'=>"multipart/form-data")) !!}

            {!! Form::hidden('idstudent', $id) !!}

            <div class="form-group">
                {!! Form::label('full_name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Apellido Paterno') !!}
                {!! Form::text('father_lastname', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Apellido Materno') !!}
                {!! Form::text('mother_lastname', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Correo') !!}
                {!! Form::text('email', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'No control') !!}
                {!! Form::text('nocontrol', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Carrera') !!}
                <select class="form-control" id="career" name="career" placeholder="Selecciona una carrera">
                    @foreach($carrera as $carrera)
                        <option value="{{ $carrera['idcareer'] }}">{{ $carrera['name'] }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    imagen del archivo: <input type="file" name="myfile" /><br />
                </div>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-outline-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    @stop