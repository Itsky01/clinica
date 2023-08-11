<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutuales extends Model
{
    use HasFactory;

// UNA MUTUAL PARA VARIOS PROF_mut
    public function profesionales_mutuales()
    {
        return $this->hasMany('app\Models\Profesionales_mutual');
    }
}
