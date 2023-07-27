<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribuidores = Distribuidor::all();
        
        return view('distribuidores.index',compact('distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distribuidores.create');
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
            $user = new User();
            $user->name = $inputs['login'];
            $user->email = $inputs['email'];
            $user->password = Hash::make($inputs['password']);
            $user->save();

            $distribuidor = new Distribuidor();
            $distribuidor->_ID = $inputs['_ID'];
            $distribuidor->login = $inputs['login']; 
            $distribuidor->save();

            $user->distribuidor()->save($distribuidor);
            return redirect()->route('distribuidores.index')
                        ->with('success','Distribuidor creado con exito.');
        } catch (\Throwable $th) {
            //var_dump("ERROR" ,$th);
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
        $distribuidor = Distribuidor::find($id);
        $user = User::find($distribuidor->user);
        return view('distribuidores.edit',compact('distribuidor','user'));
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
        $inputs = $request->all('');
        try {
            $distribuidor = Distribuidor::find($id);
            $user = User::find($distribuidor->id);
            //var_dump($distribuidor);
            //$user = User::find($distribuidor->id);
            $user->name = $inputs['login'];
            $user->email = $inputs['email'];

            $user->save();

            $distribuidor->_ID = $inputs['_ID'];
            $distribuidor->login = $inputs['login'];

            $distribuidor->save();

            return redirect()->route('distribuidores.index')
                        ->with('success','Distribuidor editado con exito.');

        } catch (\Throwable $th) {
            //throw $th;
        }
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
            $distribuidor = Distribuidor::find($id);
            $user = User::find($distribuidor->user);
            $distribuidor->delete();
            $user->delete();
            return redirect()->route('distribuidores.index')
                        ->with('success','Distribuidor borrado con exito.');
        } catch (\Throwable $th) {
            var_dump(' error', $th);
        }
    }
}
