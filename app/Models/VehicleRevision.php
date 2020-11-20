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
        return $this->belongsToMany('App\Models\VehicleRequirement', 'vehicle_evaluations', 'vehicle_revision_id', 'vehicle_requirement_id')->withPivot('valor');
    }

    /**
     * Get the status that owns the revision.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status\RequirementStatus', 'requirement_status_id');
    }

    /**
     * Many to Many (Morph)
     * Get all of the revisions for the vehicle revision.
     */
    public function general_revisions()
    {
        return $this->morphToMany('App\Models\Revision', 'revisionable');
    }

    /**
     * One to Many (inverse)
     * Get the vehicle revisions that owns the vehicle.
     */
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }
}
