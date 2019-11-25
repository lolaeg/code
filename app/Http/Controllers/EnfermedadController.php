<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;

use App\Enfermedad;

class EnfermedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $enfermedades = Enfermedad::all();

        return view('enfermedades/index',['enfermedades'=>$enfermedades]);
    }

    public function create()
    {
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('enfermedades/create',['especialidades'=>$especialidades]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'alias' => 'nullable',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);
        $enfermedad = new Enfermedad($request->all());
        $enfermedad->save();

        flash('Enfermedad creada correctamente');
        return redirect()->route('enfermedades.index');
    }

    public function show(Enfermedad $enfermedad)
    {
        //
    }

    public function edit($id)
    {
        $enfermedad = Enfermedad::find($id);
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('enfermedades/edit',['enfermedad'=>$enfermedad,'especialidades'=>$especialidades]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'alias' => 'nullable',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $enfermedad = Enfermedad::find($id);
        $enfermedad->fill($request->all());

        $enfermedad->save();

        flash('Enfermedad modificada correctamente');

        return redirect()->route('enfermedades.index');
    }
    public function retrieve($id)
    {

    }

    public function destroy($id)
    {
        $enfermedad = Enfermedad::find($id);
        $enfermedad->delete();
        flash('Enfermedad borrada correctamente');

        return redirect()->route('enfermedades.index');
    }
}
