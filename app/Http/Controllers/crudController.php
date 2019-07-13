<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datosModel;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = datosModel::all();

        return view('vistaP')->with('emps', $emps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'usuario' => 'required',
            'pass' => 'required',
            'fechaReg' => 'required',
        ]);
        $emps = new datosModel;

        $emps->nombre = $request->input('nombre');
        $emps->apellidoP = $request->input('apellidoP');
        $emps->apellidoM = $request->input('apellidoM');
        $emps->usuario = $request->input('usuario');
        $emps->pass = bcrypt($request->input('pass'));
        $emps->fechaReg = $request->input('fechaReg');

        $emps->save();

        return redirect('/principal')->with('success', 'Usuario Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'usuario' => 'required',

        ]);
        $emps = datosModel::find($id);

        $emps->nombre = $request->input('nombre');
        $emps->apellidoP = $request->input('apellidoP');
        $emps->apellidoM = $request->input('apellidoM');
        $emps->usuario = $request->input('usuario');

        $emps->save();

        return redirect('/principal')->with('success', 'Usuario Actualizado');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emps = datosModel::find($id);
        $emps->delete();

        return redirect('/principal')->with('success', 'Usuario Eliminado');
    }
}
