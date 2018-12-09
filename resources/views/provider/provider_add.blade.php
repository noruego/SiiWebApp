@extends('welcome')
@section('add')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($state,['route' => 'provider.store', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group">
                {!! Form::label('full_name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'RFC') !!}
                {!! Form::text('rfc', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Telefono') !!}
                {!! Form::text('phone', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Direccion') !!}
                {!! Form::text('address', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Estado') !!}
                <select class="form-control" id="state" name="state" placeholder="Selecciona un estado">
                    @foreach($state as $state)
                    <option value="{{ $state-id }}">{{ $state->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                    {!! Form::label('full_name', 'ciudad') !!}
                    <select class="form-control" id="city" name="city" placeholder="Selecciona un estado">
                    </select>
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $("#state").change(function (event) {
        $.get('/state/'+event.target.value,function (data) {
            $('#city').empty();
            $.each(data,function (index, city) {
                $('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
            });
        });
    });
</script>


@stop

