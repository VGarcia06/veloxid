<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'licenciaConducir',
        'constanciaEstadoSalud',
        'cuenta bancaria',
        'banco',
        'idUser'
    ];
    
}
