<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; // PARA PODER ENCRIPTAR PASSWORD
use Illuminate\Http\Request;
use App\Models\Profesional;
use App\Models\Especialidades;
use Illuminate\Support\Facades\DB;
class ProfesionalController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');

        //todas las funciones de este controller solo pueden usarse si son autenticados por el middleware admin
       
    }



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    
        // profesion: variable a pasar a vista profesionales.index con info de tabla
        $profesion = DB::table('especialidades')// inner join de profesionales con especialidad para saber nombre esp de c/u
        ->join('profesionales', 'especialidades_id', '=', 'esp_id')
        ->select('especialidades.*', 'profesionales.*')
        ->get();


       

 return view('layouts.admin.profesionales.profesionales',compact ('profesion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      $especialidades= Especialidades::all();
       return view('layouts.admin.profesionales.crear',['esp'=>$especialidades,]); // vista crear prof
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //crear prof
    {
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
            'nombre' => 'required | max:25 | min:3 |regex:/^[a-zA-ZÑñ\s]+$/',
            'apellido' => 'required|max:25|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
               'documento' => 'required|numeric|max:99999999|min:11111111',
               'telefono' => 'required|max:11111111111111|numeric|min:111111', 
              'domicilio' => 'required|max:50|min:6|string',
              'especialidad' => 'required',
              'password' => 'required|max:15|min:6|alpha_num|confirmed',
              'password_confirmation' => 'required|max:15|min:6|alpha_num',
             'email' => 'required|unique:users|max:100|email:rfc,dns,filter|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                                                               
        ],
    
     [ 'email.required' => 'el email es obligatorio!',
       'email.regex' => 'el email tiene un formato invalido!'
    
    
    ],       
    
    );
          $prof= new Profesional();
        
          $prof->prof_apellido= $request->get('apellido');
       $prof->prof_nombre= $request->get('nombre');
      
          $prof->prof_dni= $request->get('documento');
          $prof->prof_email= $request->get('email');
         $prof->prof_domicilio= $request->get('domicilio');
        
          $prof->prof_telefono= $request->get('telefono');
         
          $prof->especialidades_id=$request->get('especialidad');
          $prof->prof_clave = hash::make($request-> get('password'));
        
          $prof->save();
          return redirect('profesionales');
         
           
       
    
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
      // $prof=Profesional::find($id) // llevo datos del prof 
        $especialidades= Especialidades::all();// llevo datos de especialid
        //$prof=Profesional::find($id,['id','especialidades_id']) ->esp_nombre;
        // para buscar especialidad del prof con ese id
        $prof =DB::table('profesionales')
                                ->join('especialidades', 'profesionales.especialidades_id', '=', 'especialidades.esp_id')
                                ->where('profesionales.prof_id', '=', $id)->first(); //first obtiene solo primerz resultado
                                
                              
      
       return view('layouts.admin.profesionales.editar',['esp'=>$especialidades])->with('pr',$prof);
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
            'nombre' => 'required | max:25 | min:3 |regex:/^[a-zA-ZÑñ\s]+$/',
            'apellido' => 'required|max:25|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
               'documento' => 'required|numeric|max:99999999|min:11111111',
               'id_esp' => 'required|numeric',
               'telefono' => 'required|max:11111111111111|numeric|min:111111', 
              'domicilio' => 'required|max:50|min:6|string',
                'email' => 'required|unique:users|max:100|email:rfc,dns,filter|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
   
           
        ],
       
    );
          $prof= Profesional::find($id);
         $prof->prof_nombre= $request->get('nombre');
          $prof->prof_apellido= $request->get('apellido');
        $prof->prof_dni= $request->get('documento');
        $prof->especialidades_id=$request->get('id_esp'); // imput esp no select
         $prof->prof_telefono= $request->get('telefono');
          $prof->prof_domicilio= $request->get('domicilio');
           $prof->prof_email= $request->get('email');
          $prof->save();
          return redirect('/profesionales')->with('editado','here your success message');
      
       
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
           public function destroy($id)
        {
           $profesional= Profesional::find($id);
            if($profesional->delete()){
            
          
            return redirect()->route('profesionales')->with('success','here your success message');
        }else{
          return redirect()->route('profesionales')->with('warning','here your success message');
       
       
        }
    
    }
    }

