@extends('layouts.app')
@section('css')
    <style>
        .crear-buscar{
            display: flex;
            justify-content: space-between;
        }
        .crear{
            margin-right: 2vmin;
        }
        .mostrar-buscador{
            display: flex;
            justify-content: space-between;
        }
        .mostrar{
            display: flex;
            margin-right: 2vmin;
        }
        .buscador{
            display: flex;
            justify-items: end ;

        }
        .boton-buscar{
            display: flex;
            justify-self: end;
        }
        .busca-especialidad{
            display: flex;
            margin-bottom: 1vmin;
            margin-right: 1vmin;
            font-size: 2.5vmin;
        }
        .paginas{
            display: flex;
            font-size: 2vmin;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>
                    <div class="panel-body">
                        {!! Form::close() !!}
                        @include('flash::message')
                        <div class="crear-buscar">
                            <div class="crear">
                                {!! Form::open(['route' => 'pacientes.create', 'method' => 'get']) !!}
                                {!! Form::submit('Crear paciente', ['class'=> 'btn btn-primary'])!!}
                                {!! Form::close() !!}
                            </div>
                            <div class="mostrar-buscador">
                                    {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                                <div class="mostrar">
                                    {!! Form::submit('Mostrar todos', ['class'=> 'btn btn-primary'])!!}
                                </div>
                                    {!! Form::close() !!}
                                <div class="buscador">
                                    {!! Form::open(['route' => 'pacientes.index', 'method'=>'get']) !!}
                                    {!!Form::label('especialidad_id', 'Buscar por especialidad:') !!}
                                    <br>
                                    <div class="busca-especialidad">
                                        {!! Form::select('especialidad_id', $especialidades, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="boton-buscar">
                                        {!! Form::submit('Buscar',['class'=>'btn-primary btn']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div class="paginas">
                            <div className="links">{{$pacientes->links()}}</div>
                        </div>
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
                        <div class="paginas">
                            <div className="links">{{$pacientes->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection