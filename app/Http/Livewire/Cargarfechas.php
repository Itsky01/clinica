<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Profesional;
use App\Models\Dias;
use App\Models\Horarios_de_trabajo;
use App\Models\Fecha as FechaModel;
use Illuminate\Support\Facades\DB;use App\Models\Fechas_estudio;

class Cargarfechas extends Component
{  
   public $diaprof=null,$nombredia=null,$d_id,$seleccionar=true,$diatrabajo,$contardias=null,$contarfechas=null,$selectedprofesional=null,$fechas=null,$selecteddia=null,$startdate=null,$enddate=null; 
  public $mifecha,$prof_id,$eligefecha,$listarfecha=null,$fechasprofesional,$chkfecha=[],$deletefecha='',$idurl,$idprofes,$newid,$prof,$valor=null,$prfecha=[]; 

  protected $listeners = ['mifecha' => '$store'];
   public function render(){
    
    return view ('livewire.cargarfechas',['profesionales'=> Profesional::all()
        
   ]);
}

public function mount($id){
 $this->contarfechas = FechaModel::join('dias' ,'fechas.dias_id','=', 'dias.d_id')
     ->where('profesionales_id',$id)->count(); // contar fechas de trabajo cargadas
  //  $this->reset(['startdate']);
    $this->valor=$id;
    $this->listarfecha = FechaModel::join('dias' ,'fechas.dias_id','=', 'dias.d_id')
    ->where('profesionales_id',$id)->get(); // listar fechas cargadas
  
    //$this->valor =session()->get('id');


   $this->diaprof = Horarios_de_trabajo::join('dias' ,'horarios_de_trabajos.dias_id','=', 'dias.d_id')
     ->where('profesionales_id',$id)->get()->unique('dia'); // listar dias de trabajo

   // $this->diaprof = Dias::all(); // listar dias de trabajo




 //public function updatedSelectedprofesional($prof_id){
     

  //  $this->reset(['diaprof']);
  /*  $this->diaprof = Horarios_de_trabajo::join('dias' ,'horarios_de_trabajos.dias_id','=', 'dias.d_id')
     ->where('profesionales_id',$prof_id)->distinct()->get(); // listar dias de trabajo

   $this->listarfecha = FechaModel::join('dias' ,'fechas.dias_id','=', 'dias.d_id')
     ->where('profesionales_id',$prof_id)->get(); // listar fechas cargadas
    
    $this->contardias = Horarios_de_trabajo::join('dias','horarios_de_trabajos.dias_id','=', 'dias.d_id')
      ->where('profesionales_id',$prof_id)->count(); // contar dias de trabajo
     $this->reset(['startdate']);

     $this->contarfechas = FechaModel::join('dias' ,'fechas.dias_id','=', 'dias.d_id')
     ->where('profesionales_id',$prof_id)->count(); // contar fechas de trabajo cargadas
    $this->reset(['startdate']); */
     
  }

  
  
   public function updatedSelecteddia($d_id){
      if ($d_id !="0") {
        
   //   $this->diaprof=Dias::where('d_id',$d_id)->get();  
            
    if($d_id== "1") {
        $diatrabajo="Monday";
        
    }else{


        if($d_id== "2") {
            $diatrabajo="Thursday";
            
                }else{
            if($d_id== "3") {
                $diatrabajo="Wednesday";
                     
                
            }else{
                if($d_id== "4") {
                    $diatrabajo="Thursday";
                    
                }else{
                    if($d_id== "5") {
                        $diatrabajo="Friday";
                    }}}}}


   $this->startdate=strtotime($diatrabajo); //dia de comienzo
    
    $this->enddate=strtotime("+6 weeks ", $this->startdate); // limite de fechas:6 semanas  de anticipacion desde ese dia
   
      /*  $this->divfechas = Fecha::where('profesionales_id',$prof_id)->count();
   
    $this->horarios=null;
    $this->btncontinuar=false;  */ 
     // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));
  
  
}else{
 
 $this->startdate=null;
 $this->enddate=null; 
   // $this->seleccionar=false;
// $this->reset(['diaprof']);
//$this->diaprof=Dias::where('d_id',$d_id)->get();
   // $this->reset(['startdate']);
   $this->selectedprofesional=null;
 
   
  
}}



// brrar fecha 
public function store($valor){
  // saber si fecha recibida tiene su id en tabla
  
  
   
    $pregunta=DB::table('fechas')->select('fecha')
 ->where('fecha','=',$this->prfecha)
      ->where('profesionales_id','=',$this->valor)
      ->exists(); 
if($pregunta) {
        session()->flash('message', 'las fechas estan repetidas');  return redirect()->to(route('cargafechas', ['id' =>$valor]));
 }else{

 foreach ($this->prfecha as $key => $itemm) { 
     
      
       
   
         $fech= new FechaModel;
        $fech->fecha= $itemm;  
        $fech->profesionales_id= $this->valor; // id 
        $fech->dias_id= $this->selecteddia; // id day
         $fech->save(); 
        
    } session()->flash('message', 'Fechas agregadas!!.'); return redirect()->to(route('cargafechas', ['id' =>$this->valor]));
          
 
 } 
} 
public function deletefecha ($f_id){
    $this->deletefecha = $f_id; // recuerar id enviado desde vsta

   
}

public function deleteChkfechas($valor){    
   
  
      
  FechaModel::destroy($this->chkfecha);
  session()->flash('message', 'fechas elmnadas.');  return redirect()->to(route('cargafechas', ['id' =>$valor]));
    
 // dd($this->chkfecha);

       
       
}          
       
       
       
       
       
       
       
       
                                                                                                                                                 
public function delete($valor){
  
   FechaModel::destroy($this->deletefecha);  session()->flash('message', 'Post successfully updated.');  return redirect()->to(route('cargafechas', ['id' =>$valor]));
    
       
     $this->emit('postUpdated');
     // $id = $request->input('id');
    
  //  return view ('livewire.cargarfechas');
}



}
