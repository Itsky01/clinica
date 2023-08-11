<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_horas';
    public $timestamps = false; // quitar updated_ up y created up de tabla
}
