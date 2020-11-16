<?php

namespace App\Models\Places;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zona extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zona'
    ];

    /**
     * Get the distritos for the zona.
     */
    public function distritos()
    {
        return $this->hasMany('App\Models\Places\Distrito', 'zona_id');
    }
}
