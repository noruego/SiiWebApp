@extends('welcome')
@section('update')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($matter,array('route' =>['matter.update',$matter['keymatter']],'method'=>'PUT')) !!}

            {!! Form::hidden('keymatter', $id) !!}

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
    @stop