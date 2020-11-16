<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'vehicle_type_id'
    ];

    /**
     * One to Many (inverse)
     * Get the vehicle type that owns the subcategory.
     */
    public function vehicle_type()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicle_type_id');
    }

    /**
     * One to Many (inverse)
     * Get the category that owns the subcategory.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Product\Category', 'category_id');
    }
}
