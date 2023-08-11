<?php
namespace App\Http\Livewire;
use App\Models\Fechas_estudio;
use Livewire\Component;
use App\Models\Profesional;
use App\Models\Horarios_de_trabajo;
use App\Models\Tipo_estudios;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// crear estudios
class Crearturnoestudio extends Component
{

  public $selectedFecha=null,$selectedProfesional=null,$est=null,$horarios=null,$selectedHora=null,$profesionales=null;
  public $Confirmar,$btncontinuar=false, $btnsubmit=false,$divfechas=null,$divhoras=null, $fechas=null, $fech=null,$elegido=null ;
  


public function mount(){

 
}


    public function render()
  { 
      $estudios=Tipo_estudios::all();
        return view ('livewire.crearturnoestudio',compact('estudios'));
           

    }
   

    public function updatedEst($tipo_id){
    
      $this->profesionales = Profesional::join('profesionales_tipoestudios' ,'profesionales_tipoestudios.id_profesional','=', 'profesionales.prof_id')

      ->where('id_tipoestudio',$tipo_id)->get();
         //   return view('livewire.crearturno')->with('profesionales');
         $this->selectedfecha=null;
         $this->fechas=null;
         $this->horarios=null;
         $this->selectedhora=null;
         $this->btncontinuar=false;
           }



           public function updatedSelectedProfesional($prof_id){
   //    $this->fechas = Fechas_estudio::where('id_profesional','=',$prof_id)     
     //  ->get();


     
       $this->fechas = Fechas_estudio::join('profesionales' ,'fechas_estudios.id_profesional','=', 'profesionales.prof_id')
       ->where('id_profesional','=',$prof_id)
        ->orderBy('est_fecha')
        
       ->get(); // listar dias de trabajo
  
     
    
    
       $this->divfechas = Fechas_estudio::where('id_profesional','=',$prof_id)->count();
            $this->selectedhora=null;
            $this->horarios=null;
            $this->btncontinuar=false; 
               // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));
          
          }

          public function updatedSelectedFecha($id_profesional){
           $this->horarios= Horarios_de_trabajo::where('profesionales_id','=',$id_profesional)
            ->where('tipo_turno','estudio')
            ->whereNotIn('hora_atencion', function ($query) use ($id_profesional) {
           return  $query->select('estudios.hora')->from('estudios')
           ->where('estudios.profesionales_id','=',$id_profesional);
          })->get();

             
          //$this->horarios= Horarios_de_trabajo::where('profesionales_id',$id_profesional)->where('tipo_turno','estudio')->get();
            $this->divhoras = Horarios_de_trabajo::where('profesionales_id',$id_profesional)->where('tipo_turno','estudio')->count();
      
      $this->selectedFecha='' ;     
          
  
          $this->btncontinuar=false;
         // $this->fechas = Fechas_estudio::where('id_profesional',$id_profesional)->get();
            //  $especialidades= Especialidades::all();
           //   return view('layouts.admin.crearTurno.fechas_horarios', compact('especialidades'));
          }



          public function updatedSelectedHora(){
          $this->btncontinuar=true;
          
                 
             // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));
        
        }

           public function Confirmar(){
          $this->btnsubmit=true;
        
               
           // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));
        
        }

}
