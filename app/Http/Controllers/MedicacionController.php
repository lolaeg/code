<?php

namespace App\Http\Controllers;

use App\Medicacion;
use App\Medicamento;
use App\Tratamiento;
use Illuminate\Http\Request;

class MedicacionController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        $medicacions = Medicacion::all();
        return view('medicacions/index',['medicacions'=>$medicacions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamento = Medicamento::all()->pluck('name', 'id');
        $tratamiento = Tratamiento::all()->pluck('description', 'id');

        return view('medicacions/create',['tratamiento'=>$tratamiento, 'medicamento'=>$medicamento]);
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
            'unidadesmed' => 'required|max:255',
            'frecuenciamed' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicamento_id' => 'required|exists:medicamentos,id'
        ]);

        $medicacion = new Medicacion($request->all());
        $medicacion->save();

        flash('Medicación creado correctamente');

        return redirect()->route('medicacions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $medicacions = Medicacion::find($id);
//
        // return view('medicacions/index')->with('medicacions', $medicacions);
    }


    public function edit($id)
    {
        $medicacion = Medicacion::find($id);
        $medicamento =Medicamento::all()->pluck('name', 'id');
        $tratamiento =Tratamiento::all()->pluck('description', 'id');
        return view('medicacions/edit',['medicacion'=>$medicacion,'tratamiento'=> $tratamiento, 'medicamento'=>$medicamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unidadesmed' => 'required|max:255',
            'frecuenciamed' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicamento_id' => 'required|exists:medicamentos,id'

        ]);

        $medicacion = Medicacion::find($id);
        $medicacion->fill($request->all());

        $medicacion->save();

        flash('Medicación modificado correctamente');

        return redirect()->route('medicacions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicacion = Medicacion::find($id);
        $medicacion->delete();
        flash('Medicación borrado correctamente');

        return redirect()->route('medicacions.index');
    }
}
