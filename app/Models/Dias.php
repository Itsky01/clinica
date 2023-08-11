<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{ protected $primaryKey = 'd_id';
    use HasFactory;

     // relacion un dia varias fechas de atencion
     public function fecha()
     {
        return $this->hasMany(Fecha::class,'dias_id','d_id');
     }

      // relacion un dia varias horas de trabajo
    public function horarios_de_trabajo()
    {
        return $this->hasMany(Horarios_de_trabajo::class,'dias_id','d_id');
    }
}
