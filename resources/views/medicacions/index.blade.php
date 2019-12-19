@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicación</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicacions.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear medicación', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br><br><br>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Medicamento</th>
                                <th>Tratamiento</th>
                                <th>Instrucciones</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($medicacions as $medicacion)
                                <tr>
                                    <td>{{ $medicacion->unidadesmed }}</td>
                                    <td>{{ $medicacion->frecuenciamed }}</td>
                                    <td>{{ $medicacion->instrucciones }}</td>
                                    <td>{{ $medicacion->tratamiento->id}}</td>
                                    <td>{{ $medicacion->medicamento->id}}</td>


                                    <td>
                                        {!! Form::open(['route' => ['medicacions.edit',$medicacion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicacions.destroy',$medicacion->id], 'method' => 'delete']) !!}
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
@endsection