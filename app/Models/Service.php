<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion_origen',
        'direccion_destino',
        'distrito_origen_id',
        'distrito_destino_id',
        'fecha_recojo',
        'fecha_entrega',
        'total',
        'transaction_id',
        'user_id',
        'service_state_id'
    ];

    /**
     * Get the galleries for the service request.
     */
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery', 'service_id');
    } 

    /**
     * Get the products fot the service request.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'service_id');
    }

    /**
     * One to Many (inverse)
     * Get the service state that owns the service.
     */
    public function state()
    {
        return $this->belongsTo('App\Models\States\ServiceState', 'service_state_id');
    }

    /**
     * The drivers that belong to the service.
     */
    public function drivers()
    {
        return $this->belongsToMany('App\Models\Driver', 'allocations', 'service_id', 'driver_id');
    }

    /**
     * One to Many (inverse)
     * Get the distrito_origen that owns the service.
     */
    public function distrito_origen()
    {
        return $this->belongsTo('App\Models\Places\Distrito', 'distrito_origen_id');
    }

    /**
     * One to Many (inverse)
     * Get the distrito_destino state that owns the service.
     */
    public function distrito_destino()
    {
        return $this->belongsTo('App\Models\Places\Distrito', 'distrito_destino_id');
    }
}
