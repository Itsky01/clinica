<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesionales_mutuales extends Model
{
    use HasFactory;

     // muchos prof para 1 mutual
     public function profesional()
     {
         return $this->belongsTo('app\Models\Profesionales');
     }
      // muchas mutuales para prof
     public function mutual()
     {
         return $this->belongsTo('app\Models\Mutuales');
     }

}
