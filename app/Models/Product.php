<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alto',
        'ancho',
        'largo',
        'peso',
        'precio_unitario',
        'cantidad',
        'descripcion',
        'imagen',
        'subcategory_id'
    ];

    /**
     * One to Many (inverse)
     * Get the subcategory that owns the product.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Product\Subcategory', 'subcategory_id');
    }
}
