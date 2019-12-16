<!-- Hoja de estilos CSS -->
<link rel="stylesheet" type="text/css" href="app/public/css/pacienteIndex.css">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>
                    <div class="panel-body">
                        {!! Form::close() !!}
                        @include('flash::message')
                        {!! Form::open(['route' => 'pacientes.create', 'method' => 'get']) !!}
                        {!! Form::submit('Crear paciente', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => 'pacientes.index', 'method'=>'get']) !!}
                            <div class="form-group">
                                {!!Form::label('especialidad_id', 'Buscar por especialidad:') !!}
                                <br>
                                {!! Form::select('especialidad_id', $especialidades, ['class' => 'form-control']) !!}
                                {!! Form::submit('Buscar',['class'=>'btn-primary btn']) !!}
                            </div>
                        {!! Form::close() !!}
                        {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                        {!! Form::submit('Mostrar todos los pacientes', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                            <div className="links">{{$pacientes->links()}}</div>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>NUHSA</th>
                                <th>Enfermedad</th>

                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->name }}</td>
                                    <td>{{ $paciente->surname }}</td>
                                    <td>{{ $paciente->nuhsa }}</td>
                                    <td>{{ $paciente->enfermedad->name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection