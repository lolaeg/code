<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Enfermedad;
use App\Paciente;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes/index',['pacientes'=>$pacientes]);
    }

    public function create()
    {
        //$enfermedades = Enfermedad::all()->pluck('name','id'); //CAMBIADO

        //return view('pacientes/create',['enfermedades'=>$enfermedades]); //CAMBIADO
        return view('pacientes/create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            //'enfermedad_id' => 'required|exists:enfermedads,id' //CAMBIADO
        ]);

        //TODO: crear validación propia para nuhsa
        $paciente = new Paciente($request->all());
        $paciente->save();

        // return redirect('especialidades');

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    public function show($id)
    {
        // TODO: Mostrar las citas de un paciente
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        //$enfermedades = Enfermedad::all()->pluck('name','id'); // CAMBIADO

        //return view('pacientes/edit',['paciente'=>$paciente,'enfermedades'=>$enfermedades]); //CAMBIADO

        return view('pacientes/edit',['paciente'=> $paciente ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            //'enfermedad_id' => 'required|exists:enfermedads,id' // CAMBIADO
        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');


    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
