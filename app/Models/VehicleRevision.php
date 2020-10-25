<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleRevision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'requirement_status_id',
        'observacion'
    ];

    /**
     * The requirements that belong to the revision from the driver.
     */
    public function requirements()
    {
        return $this->belongsToMany('App\Models\VehicleRequirement', 'vehicle_evaluations', 'vehicle_revision_id', 'vehicle_requirement_id');
    }

    /**
     * Get the status that owns the revision.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status\RequirementStatus', 'requirement_status_id');
    }
}
