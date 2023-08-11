<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profesional;
use App\Models\Especialidades;
use App\Models\Fecha;
use App\Models\Horarios_de_trabajo;
use App\Models\Consultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class Crearturno extends Component
{
  public $selectedfecha=null,$selectedprofesional=null,$esp=null,$horarios=null,$selectedhora=null;
  public $profesionales=null,$Confirmar,$btncontinuar=false, $btnsubmit=false,$divfechas=null,$divhoras, $esp_id, $fechas=null,$prof_id=null,$profesionales_id=null;
  
   
  public function render(){
    
         return view ('livewire.crearturno',['especialidad'=> Especialidades::all()
        
  ]);
  }

  

    public function updatedEsp($esp_id){
    
     $this->profesionales = Profesional::where('especialidades_id',$esp_id)->get();
        //   return view('livewire.crearturno')->with('profesionales');
        $this->selectedfecha=null;
        $this->fechas=null;
        $this->horarios=null;
        $this->selectedhora=null;
        $this->btncontinuar=false;
          }

public function updatedSelectedprofesional($prof_id){
  $this->fechas = Fecha::where('profesionales_id',$prof_id)->get();
 $this->divfechas = Fecha::where('profesionales_id',$prof_id)->count();
  $this->selectedhora=null;
  $this->horarios=null;
  $this->btncontinuar=false;   
     // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));

}
public function updatedSelectedfecha($profesionales_id){
  $this->horarios= Horarios_de_trabajo::where('profesionales_id',$profesionales_id)->where('tipo_turno','consulta')->get();
  $this->divhoras = Horarios_de_trabajo::where('profesionales_id',$profesionales_id)->where('tipo_turno','consulta')->count();
  $this->selectedhora=null;
  $this->btncontinuar=false;
  //  $especialidades= Especialidades::all();
 //   return view('layouts.admin.crearTurno.fechas_horarios', compact('especialidades'));
}


public function updatedSelectedhora(){
    $this->btncontinuar=true;
  
         
     // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));

}

public function Confirmar(){
  $this->btnsubmit=true;

       
   // return view('layouts.admin.crearTurno.fechas_horarios', compact('fecha'));

}


}
