<?php
 // modelo profesional
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{ protected $table = "profesionales";
    protected $primaryKey = 'prof_id';
    use HasFactory;

    // establecer relacion uno a muchos: 1 profesional muchas consultas o estudios
    public function consultas()
    {
        return $this->hasMany(Consultas::class,'profesionales_id','prof_id');
    }

    public function estudios()
    {
        return $this->hasMany('app\Models\Estudios');
    }
// relacion un profesional varios tipos de estudios 
    public function profesionales_tipoestudios()
    {
        return $this->hasMany('app\Models\Profesionales_tipoestudio');
    }

    // relacion un profesional varios tipos de mutuales
    public function profesionales_mutuales()
    {
        return $this->hasMany('app\Models\Profesionales_mutual');
    }
    
    // relacion un profesional varios horarios de trabajo
    public function horarios_de_trabajo()
    {
        return $this->hasMany(Horarios_de_trabajo::class,'profesionales_id','prof_id');
    }

    // relacion un profesional varios fechas de atencion
    public function fechas_atencion()
    {
        return $this->hasMany(Fecha::class,'profesionales_id','prof_id');
    }


// varios prof una especialidad
    public function especialidades()
    {
        return $this->belongsTo(Especialidades::class,'especialidades_id','esp_id'); 
    }
}
