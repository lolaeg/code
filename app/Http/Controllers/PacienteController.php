<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;
use App\Medico;
use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $especialidades= Especialidad::all()->pluck('name','id');
        //Filtro
        $especialidad_id=$request->get('especialidad_id');
        $query_base = Paciente::orderBy('id', 'desc');
        if(isset($especialidad_id) && $especialidad_id!=""){
            $query_base->where('especialidad_id',$especialidad_id);
        }
        $pacientes = $query_base->paginate(6);
        return view('pacientes/index',compact('pacientes'),['especialidades'=>$especialidades])->withUsers($pacientes);
    }

    public function create()
    {
        $enfermedades= Enfermedad::all()->pluck('name','id');
        return view('pacientes/create',['enfermedades'=>$enfermedades]);

    }

    public function store(Request $request)
    {
        //En esta parte se añade especialidad_id a partir de enfermedad
        $enfermedad_id=$request->get('enfermedad_id');
        $enfermedad=Enfermedad::find($enfermedad_id);
        $especialidad_id=$enfermedad->especialidad_id;
        $request->merge(["especialidad_id"=>$especialidad_id]);
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255|unique:pacientes',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'especialidad_id'=>'required|exists:especialidads,id'
        ]);

        //TODO: crear validación propia para nuhsa (hecho)
        $paciente = new Paciente($request->all());
        $paciente->save();


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
        $enfermedades = Enfermedad::all()->pluck('name','id');
        return view('pacientes/edit',['paciente'=> $paciente], ['enfermedad'=>$enfermedades]);
    }

    public function update(Request $request, $id)
    {
        //Esta parte es para añadir especialidad_id a partir de enfermedad
        $enfermedad_id=$request->get('enfermedad_id');
        $enfermedad=Enfermedad::find($enfermedad_id);
        $especialidad_id=$enfermedad->especialidad_id;
        $request->merge(["especialidad_id"=>$especialidad_id]);
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'especialidad_id'=>'required|exists:especialidads,id'
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
