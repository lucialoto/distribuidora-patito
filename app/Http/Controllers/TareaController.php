<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Distribuidor;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index',compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distribuidores = Distribuidor::all();
        return view('tareas.create',compact('distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $inputs = $request->all('');
        try {
            $tarea = new Tarea();
            $tarea->_ID = $inputs['_ID'];
            $tarea->fecha = $inputs['fecha']; 
            $tarea->nombre = $inputs['nombre']; 	
            $tarea->direccion = $inputs['direccion']; 
            $tarea->latitud = $inputs['latitud']; 
            $tarea->longitud = $inputs['longitud']; 
            $tarea->mercancia = $inputs['mercancia']; 
            $tarea->estado = $inputs['estado']; 
            $tarea->distribuidor = $inputs['distribuidor'];
            $tarea->save();
            
            /* $distribuidor = Distribuidor::find($inputs['distribuidor']);
            $tarea->distribuidor()->save($distribuidor); */
            return redirect()->route('tareas.index')
                        ->with('success','Tarea creada con exito.');
        } catch (\Throwable $th) {
            var_dump("ERROR" ,$th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribuidor  $distribuidor
     * @return \Illuminate\Http\Response
     */
    public function show(Distribuidor $distribuidor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $distribuidor = Distribuidor::find($tarea->distribuidor);
        return view('distribuidores.edit',compact('tarea','distribuidor'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tarea = Tarea::find($id);
            $tarea->delete();
            return redirect()->route('tareas.index')
                        ->with('success','Tarea borrado con exito.');
        } catch (\Throwable $th) {
            var_dump(' error', $th);
        }
    }
}