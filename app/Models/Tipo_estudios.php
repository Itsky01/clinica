<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_estudios extends Model
{
    use HasFactory;
    // relacion un tipoestudio varios estudios 
    public function estud()
    {
        return $this->hasMany('app\Models\Estudios');
    }
// relacion un tipoestudio varios PROF QUE REALIZAN ESE ESTUDIO

    public function prof_tipoestudio()
    {
        return $this->hasMany('app\Models\Profesionales_tipoestudio');
    }
}
