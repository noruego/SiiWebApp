@extends('welcome')

@section('add')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($product,array('route' =>['product.update',$product->id],'method'=>'PUT','enctype'=>"multipart/form-data")) !!}

            {!! Form::hidden('id', $product->id) !!}

            <div class="form-group">
                {!! Form::label('full_name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Marca') !!}
                {!! Form::text('brand', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Modelo') !!}
                {!! Form::text('model', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Descripcion') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Precio') !!}
                {!! Form::number('price', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Categoria') !!}
                {!! Form::select('category',$category,$product->id_category ,['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Provedor') !!}
                {!! Form::select('provider',$provider,$product->id_provider, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                imagen del archvo: <input type="file" name="myfile" /><br />
            </div>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    @stop