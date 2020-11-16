<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'zona_origen_id', 'zona_destino_id', 'vehicle_type_id'
    ];

    /**
     * One to Many (inverse)
     * Get the zona origen that owns the price.
     */
    public function zona_origen()
    {
        return $this->belongsTo('App\Models\Places\Zona', 'zona_origen_id');
    }

    /**
     * One to Many (inverse)
     * Get the zona origen that owns the price.
     */
    public function zona_destino()
    {
        return $this->belongsTo('App\Models\Places\Zona', 'zona_destino_id');
    }

    /**
     * One to Many (inverse)
     * Get the vehicle type that owns the price.
     */
    public function vehicletype()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicle_type_id');
    }
}
