<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use App\Enfermedad;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $enfermedades= Enfermedad::all()->pluck('name','id');
        // Filtro para que solo aparezcan los tratamientos de x enfermedad (no terminado)
        $enfermedad_id = $request->get('enfermedad_id');
        $query_base = Tratamiento::orderBy('id', 'desc');
        if (isset($enfermedad_id) && $enfermedad_id != ""){
            $query_base->where('enfermedad_id',$enfermedad_id);
        }
        $tratamientos = $query_base->paginate(6);

        return view('tratamientos/index',compact('tratamientos'), ['enfermedades'=>$enfermedades])->withUsers($tratamientos);
    }

    public function create()
    {
        $enfermedades= Enfermedad::all()->pluck('name','id');
        return view('tratamientos/create',['enfermedades'=>$enfermedades]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'description' => 'required|max:255',
            'date_start' => 'required|date|after:now',
            'date_finish' => 'required|date|after_or_equal:date_start',
        ]);

        $tratamientos = new Tratamiento($request->all());
        $tratamientos->save();

        // return redirect('especialidades');

        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }

    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);

        return view('tratamientos/edit')->with('tratamiento', $tratamiento);
    }

    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
        $enfermedades = Enfermedad::all()->pluck('name','id');
        return view('tratamientos/edit',['tratamiento'=> $tratamiento], ['enfermedad'=>$enfermedades]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
            'date_start' => 'required|date|after:now',
            'date_finish' => 'required|date|after:now'
        ]);

        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());

        $tratamiento->save();

        flash('Tratamiento modificado correctamente');

        return redirect()->route('tratamientos.index');
    }

    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('tratamientos.index');
    }
}
