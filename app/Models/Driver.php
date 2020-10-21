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
        'cuentaBancaria',
        'banco',
        'idUser'
    ];

    /**
     * Get the revisions for the driver.
     */
    public function revisions()
    {
        return $this->hasMany('App\Models\DriverRevision', 'driver_id');
    }    
    
    /**
     * Get the vehicles for the driver.
     */
    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle', 'idDriver');
    } 
}
