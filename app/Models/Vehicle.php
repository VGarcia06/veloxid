<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placa',
        'capacidadCarga',
        'imagen',
        'idDriver',
        'idVehicleType'
    ];

    /**
     * Get the revisions for the driver.
     */
    public function revisions()
    {
        return $this->hasMany('App\Models\VehicleRevision', 'vehicle_id');
    }  
}
