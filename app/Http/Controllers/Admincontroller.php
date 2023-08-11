<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; // PARA PODER ENCRIPTAR PASSWORD
use Illuminate\Http\Request;
use App\Models\User; // llamamos al modelo user para trabajar con su controlador
class Admincontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('admin');

        //$this->middleware('log')->only('index');

       
    }
    public function index()
    {
        $usuario= User::all(); // pedimos a modelo  q traiga toda la tabla user
    
     return view('layouts.admin.pacientes.pacientes',compact ('usuario')); // paciente: variable a pasar a vista pacientes.blade con info de tabla
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('layouts.admin.pacientes.crear');
    }

    public function adprincipal() // pantalla principal admin
    {
      return view('layouts.admin.dash_admin');
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
    {   $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
      'name' => 'required | max:25 | min:3 |regex:/^[a-zA-ZÑñ\s]+$/',
      'apellido' => 'required|max:25|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
         'documento' => 'required|numeric|max:99999999|min:11111111',
         'telefono' => 'required|max:11111111111111|numeric|min:111111', 
         'domicilio' => 'required|max:50|min:6|string',
       'fecha' => 'required|date',
       'email' => 'required|unique:users|max:100|email:rfc,dns,filter|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
       'password' => 'required|max:15|min:6|alpha_num|confirmed',
       'password_confirmation' => 'required|max:15|min:6|alpha_num',

    ]);
     $usuario= new User();
      $usuario->name= $request->get('name');// get captura valor del name del input y se asigna a $usuario->name
       $usuario->apellido= $request->get('apellido');
        $usuario->dni= $request->get('documento');
         $usuario->telefono= $request->get('telefono');
          $usuario->domicilio= $request->get('domicilio');
          $usuario->fecha= $request->get('fecha');
          $usuario->email= $request->get('email');
          $usuario->rol='3';
          $usuario->password = hash::make($request-> get('password'));
      $usuario->save();
      return redirect()->route('pacientes');

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
          'name' => 'required | max:25 | min:3 |regex:/^[a-zA-ZÑñ\s]+$/',
          'apellido' => 'required|max:25|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
             'documento' => 'required|numeric|max:99999999|min:11111111',
             'telefono' => 'required|max:11111111111111|numeric|min:111111', 
             'domicilio' => 'required|max:50|min:6|string',
           'fecha' => 'required|date',
           'email' => 'required|unique:users|max:100|email:rfc,dns,filter|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
             
           
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
       $usuario= User::find($id);
        if($usuario->delete()){
        
      
        return redirect()->route('pacientes')->with('success','here your success message');
    }else{
      return redirect()->route('pacientes')->with('warning','here your success message');
    }

}
}
