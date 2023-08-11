<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios_de_trabajo extends Model
{
  
 use HasFactory;
 protected $primaryKey = 'hs_id';// le digo como se llama la clave primaria
 public $timestamps = false; // quitar updated_ up y created up de tabla
  


// muchos horarios para un profesional
    public function profesional()
     {
        return $this->belongsTo(Profesional::class,'profesionales_id','prof_id'); 
     }


      // muchas hs para 1 dia
      public function dia()
      {
        return $this->belongsTo(Dias::class,'dias_id','d_id'); 
      }
}
