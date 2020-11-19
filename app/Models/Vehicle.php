<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{

    use SoftDeletes;
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

    /**
     * One to Many (inverse)
     * Get the document type that owns the person.
     */
    public function type()
    {
        return $this->belongsTo('App\Models\VehicleType', 'idVehicleType');
    }

    /**
     * The subcategories that belong to the vehicle.
     */
    public function subcategories()
    {
        return $this->belongsToMany(
            'App\Models\Product\Subcategory', 
            'vehicle_subcategory',
            'vehicle_id',
            'subcategory_id'
        );
    }
}
