<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;
    protected $primaryKey = 'esp_id';
    public $timestamps = false; // quitar updated_ up y created up de tabla
   
// una espec varios prof
    public function profesional()
    {
       return $this->hasMany(Profesional::class,'especialidades_id','esp_id');
    }
}
