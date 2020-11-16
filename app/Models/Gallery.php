<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen'
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
