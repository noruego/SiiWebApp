@extends('welcome')
@section('add')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['route' => 'matter.store', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group">
                {!! Form::label('full_name', 'Nombre de la materia') !!}
                {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-outline-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
    @stop