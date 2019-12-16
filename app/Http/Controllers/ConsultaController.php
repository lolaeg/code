<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Consulta;


class ConsultaController extends Controller
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
        //


        $consultas = Consulta::all();

        return view('consultas/index')->with('consultas', $consultas);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
    ]);

        //
        $consultas = new Consulta($request->all());
        $consultas->save();

        // return redirect('especialidades');

        flash('Consulta creada correctamente');

        return redirect()->route('consultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $consulta = Consulta::find($id);

        return view('consultas/edit')->with('consulta', $consulta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        flash('Consulta borrada correctamente');

        return redirect()->route('consultas.index');


        /*public function destroyAll()
        {
            Especialidad::truncate();
            flash('Todas las especialidades borradas correctamente');

            return redirect()->route('especialidades.index');
        }*/

    }
}