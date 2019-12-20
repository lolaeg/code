@extends('layouts.app')
@section('css')
    <style>
        .fecha-duracion{
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita <br> La cita durará 15 minutos por defecto <br/> </div>
                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la cita') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="fecha-duracion">
                            <div class="form-group">
                                {!! Form::label('fecha_hora', 'Fecha y hora de la cita') !!}
                                <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                            </div>
                            <div class="duracion">
                                {!! Form::label('duracion', 'Duración') !!}
                                {!! Form::text('duracion',15,['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('consulta_id', 'Consulta') !!}
                            <br>
                            {!! Form::select('consulta_id', $consultas, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection