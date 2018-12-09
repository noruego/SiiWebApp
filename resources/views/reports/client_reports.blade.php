@extends('welcome')
<title>Reportes de clientes</title>
@section('list')
    <?php $id=1;?>
<div class="container">
    <div class="row">
        Escoge un cliente para generar su reporte
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::label('full_name', 'Cliente') !!}
            <select class="form-control" id="client" name="client" placeholder="Selecciona un estado">
                @foreach($client as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row" align="center">
        <a id="link" class="btn btn-primary btn-xs" href="{{ route('/report_products/search',['id' =>$id] )}}" >Generar reporte</a>
        <a id="link" class="btn btn-primary btn-xs" href="{{ route('/report_products/show')}}" >Generar reporte de todos los clientes</a>
    </div>
</div>
<script>
    $("#client").change(function (event) {
        var id=event.target.value;

        <?php
        $id = "document.write(id)";
        ?>
        document.getElementById('link').href = "/report_products/search/"+id;
    });
</script>
    @stop


