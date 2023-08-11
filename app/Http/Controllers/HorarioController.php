<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Profesional;
use App\Models\Fecha;
use App\Models\Dias;
use App\Models\Fechas_estudio;
use App\Models\Horarios_de_trabajo;
use App\Models\Horas; 


use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      //  $profesional= Profesional::find($id);
      $horarios = DB::table('horarios_de_trabajos')
      ->join('profesionales', 'horarios_de_trabajos.profesionales_id', '=', 'profesionales.prof_id')
      ->join('dias', 'horarios_de_trabajos.dias_id', '=', 'dias.d_id')
      ->where('profesionales.prof_id', '=', $id) 
      ->select('horarios_de_trabajos.*', 'profesionales.*','dias.*')
       ->get();

        $dias_trabajo= Dias::all();
        $horasreloj= Horas::all();
        $profid = DB::table('profesionales')->where('prof_id', $id)->first(); // id prof
       // return view('layouts.admin.profesionales.cargahorarios',['dias'=>$dias_trabajo]);
       return view('layouts.admin.profesionales.cargahorarios',['dias'=>$dias_trabajo,'idprof'=>$profid,'hsreloj'=>$horasreloj])->with('horas',$horarios);
    
    }
// listar hs de trabajo generales
     public function listarHoras()
      {

      $hsgen= DB::table('horas')->orderBy('horas_reloj', 'asc')->get();
     
     
      
     
      return view('layouts.admin.profesionales.horarios_centrales')->with('horarios',$hsgen);
   


     }

     // cargar horarios de trabajo para consultas
    public function store(Request $request){
            //  dd($request);    
        $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
             
            //   'fecha.*' => 'required|date|date_format:Y-m-d', //  fecha select multiple
            //   'fecha'=>'required|after:eligefecha',
              
              'profid'=>'required|numeric|exists:profesionales,prof_id', // idprof
                'selectest'=>'required|numeric|exists:dias,d_id', // id dia
                'selecthora'=>'required|exists:horas,horas_reloj', // horas elegidas
         //       'hora' => 'required|exists:horarios_de_trabajos,hora_atencion',
           ],
       );


// saber si 1 o mas horarios de estudios recibidos se repite en tabla 
 


$hs=$request->get('selecthora');

$pregunta=DB::table('horarios_de_trabajos')  
       ->select('hora_atencion')
       ->where('profesionales_id','=',$request->get('profid'))
       ->where('hora_atencion','=',$request->get('selecthora'))
       ->where('dias_id','=',$request->get('selectest'))
     //  ->orWhere('tipo_turno', 'estudio')
     //  ->orWhere('tipo_turno', 'consulta')
       ->count();
 $profid= Profesional::find($request->get('profid')); // id para el retorno a la view
       
       if(empty($pregunta)) {

        
 foreach ($hs as $key => $itemm) {  


 $horas= new Horarios_de_trabajo();
       // $horaselegidas[]=$dato;
          $horas->profesionales_id= $request->get('profid'); // id prof
         $horas->tipo_turno =$request->get('radiohs'); // radio cons o est
        $horas->dias_id=$request->get('selectest'); // id dia
        $horas->hora_atencion=$itemm;
         $horas->save();}

         return redirect()->route('creahoras',$profid->prof_id)->with('exitoo','here your success message');;

     //    return redirect('creahoras');
           
    }else{
         return redirect()->route('creahoras',$profid->prof_id)->with('horarepetida','here your success message');;

      // return redirect()->route('creahoras')->with('horarepetida','here your success message');
      
    //    return redirect('creahoras');
  }


} /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guarda_hs(Request $request)
    {


      $request->validate([ // validacion de los imput por si estan vacios o no cumplen alguna condicion
        'imphora'=>'required|date_format:H:i|unique:horas,horas_reloj', // imp cargar hora
            
       ],
   );


      $nueva_hora= new Horas();

      $nueva_hora->horas_reloj= $request->get('imphora'); 
       
      $nueva_hora->save();

      return redirect()->route('listarhs')->with('exitoo','here your success message');
    }

public function eliminaHora ($id){

  $hora_borrada= Horas::find($id);
  if($hora_borrada->delete()){
  
    return redirect()->route('listarhs')->with('success','here your success message');
}else{
return redirect()->route('listarhs')->with('warning','here your success message');


}

}


    public function mostrar_horas(){
     
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$idprof=DB::table('horarios_de_trabajos')  
        ->select('profesionales_id')
        ->where('hs_id','=',$id)
        ->first();
      $horas= Horarios_de_trabajo::find($id);
      if($horas->delete()){
      //  return view('your-view', url()->current()); 
     // echo URL::current();
      
     //   return ->url()->current();
 //     return ->(URL::current());
 return redirect()->route('creahoras',$idprof->profesionales_id)->with('exito_borrar','here your success message');;
   // return redirect()->action([HorarioController::class, 'index'],['id' => $idprof]);
  }else{
    return redirect()->route('asignahoras')->with('warning','here your success message');
 
 
  }


        //
    }
}
