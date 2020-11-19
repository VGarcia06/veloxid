<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen',
        'service_state_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'service_state_id', 'service_id'
    ];

    /**
     * One to Many (inverse)
     * Get the service state that owns the service.
     */
    public function state()
    {
        return $this->belongsTo('App\Models\States\ServiceState', 'service_state_id');
    }
}
