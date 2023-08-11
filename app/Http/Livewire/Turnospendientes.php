<?php

namespace App\Http\Livewire;

use App\Models\Estudio;
use App\Models\Fechas_estudio;
use App\Models\Profesional;
use App\Models\Tipo_estudios;
use Illuminate\Http\Request;
use Livewire\Component;

class Turnospendientes extends Component
{

    public $selectedprof=null, $turno=null;
    public function render()
    {
        return view ('livewire.turnospendientes',['profesionales'=> Profesional::all()
    ]);

    }


//ver tabla con turnos para un prof seleccionado
    public function updatedSelectedprof($prof_id){
        $this->turno = Estudio::join('profesionales', 'profesionales_id', '=', 'prof_id') // tabla prof
        ->join('users', 'usuarios_id', '=', 'id') // tabla users
         ->join('tipo_estudios', 'tipoestudios_id', '=', 'tipo_id') // tabla tipo_estudio
         ->join('fechas_estudios', 'fechas_id', '=', 'id_fechaest') // tabla fechaestudio
         ->where('profesionales_id',$prof_id)->get();
      
       
    }
}


?>