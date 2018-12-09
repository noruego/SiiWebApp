@extends('welcome')
@section('update')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('route' =>['groups.update',$groups_sele['idGroup']],'method'=>'PUT')) !!}

            {!! Form::hidden('idgroup', $id) !!}

            <div class="form-group">
                {!! Form::label('full_name', 'Profesor') !!}
                <select class="form-control" id="idteacher" name="idteacher" placeholder="Selecciona un profesor">
                    @foreach($teacher as $teacher)
                        <option value="{{ $teacher['idteacher'] }}">{{ $teacher['name'].' '.$teacher['father_lastname'].' '.$teacher['mother_lastname'].' ' }}</option>
                    @endforeach
                        <option selected="{{ $groups_sele['teacher']['idteacher'] }}"> {{ $groups_sele['teacher']['name'].' '.$groups_sele['teacher']['father_lastname'].' '.$groups_sele['teacher']['mother_lastname'].' ' }} </option>
                </select>

            </div>
            <div class="form-group">
                {!! Form::label('full_name', 'Materias') !!}
                <select class="form-control" id="matter" name="matter" placeholder="Selecciona una Materia">
                    @foreach($matter as $matter)
                        <option value="{{ $matter['keymatter'] }}">{{ $matter['name'] }}</option>
                    @endforeach
                        <option selected="{{ $groups_sele['matter']['keymatter'] }}"> {{ $groups_sele['matter']['name'] }} </option>
                </select>

            </div>


            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-outline-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    @stop