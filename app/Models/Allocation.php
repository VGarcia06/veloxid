<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado', 'driver_id', 'service_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'driver_id', 'service_id'
    ];

    /**
     * Get the auxiliars for the allocation.
     */
    public function auxiliars()
    {
        return $this->hasMany('App\Models\Auxiliar', 'allocation_id');
    }

    /**
     * One to Many (Inverse)
     * Get the post that owns the comment.
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    /**
     * One to Many (Inverse)
     * Get the post that owns the comment.
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }
}
