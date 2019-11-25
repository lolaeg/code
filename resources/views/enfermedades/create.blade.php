@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear enfermedad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'enfermedades.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la enfermedad') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('alias', 'Nombre común de la enfermedad (si tiene)') !!}
                            {!! Form::text('alias',null,['class'=>'form-control', 'nullable', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('especialidad_id', 'Especialidad de la enfermedad') !!}
                            <br>
                            {!! Form::select('especialidad_id', $especialidades, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection