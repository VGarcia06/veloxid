<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persons';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellidoPaterno', 
        'apellidoMaterno', 
        'telefono', 
        'direccion', 
        'correo', 
        'imagen', 
        'numero',
        'idDocumentType',
        'idUser'
    ];

    /**
     * One to Many (inverse)
     * Get the document type that owns the person.
     */
    public function documentType()
    {
        return $this->belongsTo('App\Models\Document', 'idDocumentType');
    }
}
