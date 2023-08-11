<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
  protected $primaryKey = 'est_id';
    use HasFactory;



    // inversa relacion uno a muchos : muchhas consultas para 1 usuario y para 1 profes
    public function user()
    {
        return $this->belongsTo(User::class,'usuarios_id','id'); 
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class,'profesionales_id','prof_id'); 
    }

   public function fecha()
    {
        return $this->belongsTo(Fecha::class,'fechas_id','f_id'); 
    } 

    public function tipoestudio()
    {
        return $this->belongsTo(Tipo_estudios::class,'tipoestudios_id','id'); 
    } 
}
