@extends('welcome')
@section('add')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['route' => '/report_orders/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group col-md-6">
                {!! Form::label('email', 'Fecha de inicio') !!}
                {!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control','required' => 'required']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('email', 'Fecha de terminacion') !!}
                {!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-5"></div>
            <div class="form-group col-md-4">
                {!! Form::submit('Generar reporte', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop