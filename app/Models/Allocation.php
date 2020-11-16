<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado'
    ];

    /**
     * Get the auxiliars for the allocation.
     */
    public function auxiliars()
    {
        return $this->hasMany('App\Models\Auxiliar', 'allocation_id');
    }
}
