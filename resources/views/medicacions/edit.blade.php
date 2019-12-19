@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medicación</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicacion, [ 'route' => ['medicacions.update',$medicacion->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('tratamiento_id', 'Tratamiento') !!}
                            <br>
                            {!! Form::select('tratamiento_id', $tratamiento, $medicacion->tratamiento_id, ['class'=>'form-control','required'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('medicamento_id', 'Medicamento') !!}
                            <br>
                            {!! Form::select('medicamento_id', $medicamento, $medicacion->medicamento_id, ['class'=>'form-control','required'])  !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('unidadesmed', 'Unidades') !!}
                            {!! Form::text('unidadesmed',$medicacion->unidadesmed,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuenciamed', 'Frecuencia') !!}
                            {!! Form::text('frecuenciamed',$medicacion->frecuenciamed,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Instrucciones') !!}
                            {!! Form::text('instrucciones',$medicacion->instrucciones,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
