<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distrito extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'distrito'
    ];

    /**
     * One to Many (inverse)
     * Get the zona that owns the distrito.
     */
    public function zona()
    {
        return $this->belongsTo('App\Models\Places\Zona', 'zona_id');
    }
}
