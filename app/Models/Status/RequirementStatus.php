<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Model;

class RequirementStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requirement_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado'
    ];
}
