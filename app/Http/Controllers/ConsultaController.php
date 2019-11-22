<?php

namespace App\Http\Controllers;

use App\consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $consultas = Consulta::all();

        return view('consultas/index')->with('consultas', $consultas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('consultas/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        //
        $consulta = new consulta($request->all());
        $consulta->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $consulta = Consulta::find($id);

        return view('consultas/edit')->with('consulta', $consulta);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $consulta = Consulta::find($id);
        $consulta->fill($request->all());

        $consulta->save();

        flash('Consulta modificada correctamente');

        return redirect()->route('consultas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $consulta = Cosulta::find($id);
      $consulta->delete();
        flash('Consulta borrada correctamente');

        return redirect()->route('consultas.index');
    }

}
