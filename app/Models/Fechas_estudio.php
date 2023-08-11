<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechas_estudio extends Model
{
   
    protected $primaryKey = 'id_fechaest'; // si cambio id de tabla debo indicarlo aca
 use HasFactory;
public function profesional()
    {
        return $this->belongsTo(Profesional::class,'id_profesional','prof_id'); 
    }

 // muchas fechas para 1 dia
     public function dia()
     {
        return $this->belongsTo(Dias::class,'dias_id','d_id'); 
     }

}