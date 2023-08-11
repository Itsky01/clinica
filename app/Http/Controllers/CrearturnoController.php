<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Profesional;
use App\Models\Especialidades;
use App\Models\Tipo_estudios;
use App\Models\Consultas;
use App\Models\Estudio;
use App\Models\Fecha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class CrearturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
      {
         $estudios= Tipo_estudios::all();
        $especialidades= Especialidades::all();
            return view('layouts.admin.crearTurno.nuevo_turno',['esp'=>$especialidades,'est'=>$estudios]); // vista crear turno para estudios
   
           }


           public function ver_turnos()
           { // datos para ver turnos de estudios pendientes
            $profesionales= Profesional::all();
        $turno = DB::table('estudios')// inner join estudios,prof,fecha,usuario,tipoestudio para tabla turnos pendientes
        ->join('profesionales', 'profesionales_id', '=', 'prof_id')
        ->join('users', 'usuarios_id', '=', 'id')
        ->join('tipo_estudios', 'tipoestudios_id', '=', 'tipo_id')
        ->join('fechas_estudios', 'fechas_id', '=', 'id_fechaest')
        ->select('estudios.*', 'profesionales.*','users.*','tipo_estudios.*','fechas_estudios.*',)
        ->get();


        return view('layouts.admin.crearTurno.ver_turnos',compact ('turno','profesionales'));
                }





        public function borra_estudio($id){

        $fechaestudio= Estudio::find($id);
        if($fechaestudio->delete()){
        
      
        return redirect()->route('verturnos')->with('success','here your success message');
    }else{
      return redirect()->route('verturnos')->with('warning','here your success message');
   
   
    }


    }

 // elegir fechas y horarios del turno
    public function elegir($id){
      /*  $profesional =DB::table('profesionales')
        ->join('horarios_de_trabajos', 'horarios_de_trabajos.profesionales_id', '=', 'profesionales.id')
        ->join('dias', 'horarios_de_trabajos.dias_id', '=', 'dias.d_id')
        ->where('profesionales.especialidades_id', '=', $id) //first obtiene solo primerz resultado
        ->get();


        $fechas_disp =DB::table('profesionales')
        ->join('fechas', 'fechas.profesionales_id', '=', 'profesionales.id')
        ->join('dias', 'fechas.dias_id', '=', 'dias.d_id')
        ->where('profesionales.especialidades_id', '=', $id) //first obtiene solo primerz resultado
        ->get();

        return view('layouts.admin.crearTurno.fechas_horarios',compact('profesional','fechas_disp')); // vista crear turno
   */
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
               'tipo' => 'required|numeric', //id prof
               'radio' => 'required|string|exists:mediopagos,tipo', // mutual, part
               'hidtxtfecha' => 'required|date_format:Y-m-d', // text fecha
               'fech' => 'required|numeric|exists:fechas,f_id', // id fecha
                'hora' => 'required|exists:horarios_de_trabajos,hora_atencion',
                                                                
        ],

       ['fech.exists' => 'la fecha es invalida!',
        'hora.date_format'=>'formato de hora invalido',
        'hora.exists'=>'hora invalida',
        'hora.required'=>'hora requerida',
        'hidtxtfecha.exists' => 'la fecha no se encuentra!',
        'radio.exists'=>'medio de pago invalido',   
        'radio.required'=>'medio de pago requerido'   
    ],  
            
   
                 
    ); 


    $pregunta=DB::table('fechas') // saber si fecha recibida tiene su id en tabla
    ->select('f_id')
    ->where('fecha','=',$request->get('hidtxtfecha'))
    ->where('f_id','=',$request->get('fech'))
    ->first();
    if(!empty($pregunta)) {
          $con= new Consultas();
          $con->profesionales_id= $request->get('tipo'); //id prof
          $con->usuarios_id= Auth::user()->id; // id usuario autenticado
         
          $con->fechas_id=$request->get('fech'); // input fech
          $con->hora=$request->get('hora');  
          $con->mediopago= $request->get('radio'); // radiobutt radio
          $con->save();
          return redirect('/tipo_turno')->with('exito','here your success message'); 
        //  return redirect('/tipo_turno')->with('exito_estudio','here your success message');; 
        
    }else{

 // fecha adulterada
         
        return redirect()->route('fechas')->with('invalidfecha','here your success message');
      
     
    }}

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

    
    public function guarda_estudio(Request $request)
    {
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
               'tipo' => 'required|numeric', //id prof
               'tipoestudio'=>'required|numeric', // id tipoestuio
               'radio' => 'required|string|exists:mediopagos,tipo', // text mutual, part
               'hidtxtfecha' => 'required|date_format:Y-m-d', // text fecha
               'fech' => 'required|numeric|exists:fechas_estudios,id_fechaest', // id fecha
                'hora' => 'required|exists:horarios_de_trabajos,hora_atencion',
                                                                
        ],

       ['fech.exists' => 'la fecha es invalida!',
        'hora.date_format'=>'formato de hora invalido',
        'hora.exists'=>'hora invalida',
        'hora.required'=>'hora requerida',
        'hidtxtfecha.exists' => 'la fecha no se encuentra!',
        'radio.exists'=>'medio de pago invalido',   
        'radio.required'=>'medio de pago requerido'   
    ],  
            
   
                 
    ); 


    $pregunta=DB::table('fechas_estudios') // saber si fecha recibida tiene su id en tabla
    ->select('id_fechaest')
    ->where('est_fecha','=',$request->get('hidtxtfecha'))
    ->where('id_fechaest','=',$request->get('fech'))
    ->first();
    if(!empty($pregunta)) { // si fecha existe guarda turno estudio
          $est= new Estudio();
          $est->profesionales_id= $request->get('tipo'); //id prof
          $est->usuarios_id= Auth::user()->id; // id usuario autenticado
          $est->tipoestudios_id=$request->get('tipoestudio'); // id tipo estudio
          $est->fechas_id=$request->get('fech'); // input fecha
          $est->hora=$request->get('hora');  
          $est->mediopago= $request->get('radio'); // radiobutt radio
          $est->save();
          return redirect('/tipo_turno')->with('exito_estudio','here your success message'); 
           
    }else{

 // fecha adulterada
         
        return redirect()->route('fechas')->with('invalidfecha','here your success message');
    
     
    }}

    
// guardar fechas cargadas
    public function guardafechas(Request $request){
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
             
          'fecha.*' => 'required|date|date_format:Y-m-d', //  fecha select multiple
          'fecha'=>'required|after:eligefecha',
         // 'eligefecha'=>'date',
        //  'profesional'=>'required|numeric', // id prof
             'day'=>'required|numeric', // id dia

             'fecha'=> ['required', Rule::unique('fechas')->where(function ($query) use ($request) {
              return $query->where('profesionales_id', $request->get('profesional'));
             }),   
            ],
        ],

        

       ['fecha.required'=>'fecha/s requerida/s',
       'fecha.date'=>'fecha invalida',
       'fecha.after'=>'fecha invalida',
       'fecha.date_format'=>'formato de fecha invalido ',
       'fecha.unique'=>'la fecha ya ha sido cargada ',
         'day.required' => 'dia de atencion requerido!',
       // 'profesional.required' => 'profesional requerido!'
          
    ],    
 ); 

//$valores[]= $request->get('pasarfecha');
$now = date('Y-m-d');
  $futuro = date( "Y-m-d", strtotime("$now,+6 week" ) ); 
  
   // $now->format('Y-m-d'); 
  

   foreach ($request->get('fecha') as $key => $itemm) {          
    if($itemm < $now) {
    return redirect()->route('carga_fechas')->with('errorfecha','here your success message');    
          // si fecha es anterior al dia de hoy no guarda
           }else{
    if($itemm > $futuro){ // si a fecha/s elegida/s son mayores a 6 semanas a partir de hoy, eror

        return redirect()->route('creafechas')->with('fechamayor','here your success message'); 
}else{
   $fech= new Fecha();
    $fech->fecha= $itemm;  
    $fech->profesionales_id= $request->get('idprof'); // radiobutt radio
    $fech->dias_id= $request->get('day'); // id day
     $fech->save();}}}
 //   return redirect('/tipo_turno')->with('exito_estudio','here your success message');; 
 return redirect()->to(route('cargafechas', ['id' =>$request->get('idprof')]))->with('succesfecha','here your success message');;
 
 }

    public function borrarfechas($id){

        $fechascargadas= fecha::find($id);
        if($fechascargadas->delete()){
        
      
        return redirect()->route('creafechas')->with('success','here your success message');
    }else{
      return redirect()->route('creafechas')->with('warning','here your success message');
   
   
    }


    }

   
}
