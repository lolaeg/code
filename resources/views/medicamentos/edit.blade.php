@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicamento, [ 'route' => ['medicamentos.update',$medicamento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre comercial del medicamento') !!}
                            {!! Form::text('name',$medicamento->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composition', 'Composición') !!}
                            {!! Form::text('composition',$medicamento->composition,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentation', 'Presentación') !!}
                            {!! Form::text('presentation',$medicamento->presentation,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection