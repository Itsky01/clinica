<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model

{


   protected $fillable = [ // esto es para que campos se puedan manipular desde el exterior
      'f_id',
      'fecha',
      'profesionales_id',
      'dias_id',
      
  ];
    
  

 protected $primaryKey = 'f_id';
  use HasFactory;

    public $timestamps = false; // quitar updated_ up y created up de tabla
    
 //muchas fechas para 1 profesional
    public function profesional()
    {
        return $this->belongsTo(Profesional::class,'profesionales_id','prof_id'); 
    }


     // muchas fechas para 1 dia
     public function dia()
     {
        return $this->belongsTo(Dias::class,'dias_id','d_id'); 
     }
}
