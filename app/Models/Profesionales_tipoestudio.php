<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesionales_tipoestudio extends Model
{
    use HasFactory;

    // muchos tipo estudios para 1 profesional
    public function profesional()
    {
        return $this->belongsTo('app\Models\Profesionales');
    }

    public function tipoest()
    {
        return $this->belongsTo('app\Models\Tipo_estudio');
    }
}
