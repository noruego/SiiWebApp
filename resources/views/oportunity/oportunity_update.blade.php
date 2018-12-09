@extends('welcome')
@section('update')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($oportunity,array('route' =>['oportunity.update',$oportunity['idoportunity']],'method'=>'PUT')) !!}

            {!! Form::hidden('idoportunity', $id) !!}

            <div class="form-group">
                {!! Form::label('full_name', 'Descripcion') !!}
                {!! Form::text('description', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-outline-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    @stop