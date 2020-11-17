<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'numero',
        'document_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'document_type_id'
    ];

    /**
     * One to Many (inverse)
     * Get the document type that owns the auxiliar.
     */
    public function document_type()
    {
        return $this->belongsTo('App\Models\DocumentType', 'document_type_id');
    }
}
