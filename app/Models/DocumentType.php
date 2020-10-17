<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documenttype';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];
}
