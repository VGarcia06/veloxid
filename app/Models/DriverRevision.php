<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverRevision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requirement_status_id',
        'observacion'
    ];

    /**
     * The requirements that belong to the revision from the driver.
     */
    public function requirements()
    {
        return $this->belongsToMany('App\Models\DriverRequirement', 'driver_evaluations', 'driver_revision_id', 'driver_requirement_id')->withPivot('valor');
    }

    /**
     * Get the status that owns the revision.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status\RequirementStatus', 'requirement_status_id');
    }

    /**
     * One to Many (inverse)
     * Get the driver that owns the revision.
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }
}
