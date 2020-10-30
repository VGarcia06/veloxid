<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LateralMenu extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lateralmenus';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'href', 
        'icon', 
        'idModule'
    ];

}
