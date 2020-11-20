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
     * Get the user that owns the driver data.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'idUser');
    }

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

    /**
     * Get the allocations for the driver.
     */
    public function allocations()
    {
        return $this->hasMany('App\Models\Allocation', 'driver_id');
    }

    /**
     * Get the revisions for the driver.
     */
    public function general_revisions()
    {
        return $this->hasMany('App\Models\Revision', 'driver_id');
    }    
}
