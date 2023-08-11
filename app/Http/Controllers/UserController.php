<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; // PARA PODER ENCRIPTAR PASSWORD
use Illuminate\Http\Request;
use App\Models\User; // llamamos al modelo user para trabajar con su controlador
class UserController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('usuario');

        //$this->middleware('log')->only('index');

       
    }
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // return view('layouts.admin.pacientes.crear');
    }

    
    public function usprincipal() // pantalla principal admin
    {
     return view('layouts.usuario.dash_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */   
    //crear nuevo usuario
    public function store(Request $request) 
    {
  }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $us= User::find($id);
        return view('layouts.admin.pacientes.editar')->with('us',$us); // us: variable q paso a vista editar.blade, con el id que busco en la bd
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
       
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
            'nombre' => 'required',
          'apellido' => 'required',
             'documento' => 'required',
             'telefono' => 'required', 
            'domicilio' => 'required',
           'fecha' => 'required',
            'email' => 'required'
           
        ]);
          $usuario= User::find($id);
         $usuario->name= $request->get('nombre');
          $usuario->apellido= $request->get('apellido');
        $usuario->dni= $request->get('documento');
         $usuario->telefono= $request->get('telefono');
          $usuario->domicilio= $request->get('domicilio');
          $usuario->fecha= $request->get('fecha');
          $usuario->email= $request->get('email');
          $usuario->save();
          return redirect('/pacientes');
         
           
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('pacientes')->with('success','El registro ha sido eliminado correctamente');
    }


}









