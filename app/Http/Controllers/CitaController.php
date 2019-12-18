<?php

namespace App\Http\Controllers;

use App\consulta;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use App\Tratamiento;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citass = Cita::all();
        $citas= array();
        $fecha_actual = date('Y-m-d\Th:i');
        foreach($citass as $cita){
            if($fecha_actual<$cita->fecha_hora){
                array_push($citas,$cita);
            }
        }
        return view('citas/index', ['citas' => $citas]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $consultas = Consulta::all()->pluck('name','id');

        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'consultas'=>$consultas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'consulta_id' =>'required|exists:consultas,id',
            'fecha_fin' => 'date|after:now'

        ]);

        $cita = new Cita($request->all());
        $cita->save();


        flash('Cita creada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $citas = Cita::all();
        return view('citas/index', ['citas' => $citas]);

      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medico = Medico::all()->pluck('full_name','id');

        $paciente = Paciente::all()->pluck('full_name','id');

        $consulta = Consulta::all()->pluck('name','id');


        return view('citas/edit',['cita'=> $cita, 'medico'=>$medico, 'paciente'=>$paciente, 'consulta'=>$consulta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'consulta_id' =>'required|exists:consultas,id',
            'fecha_fin' => 'date|after:now'

        ]);

        $cita = Cita::find($id);
        $cita->fill($request->all());

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
