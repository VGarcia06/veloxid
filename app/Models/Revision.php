<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    /**
     * Get all of the driver revisions that are assigned this revision.
     */
    public function driver_revisions()
    {
        return $this->morphedByMany('App\Models\DriverRevision', 'revisionable');
    }

    /**
     * Get all of the vehicle revisions that are assigned this revision.
     */
    public function vehicle_revisions()
    {
        return $this->morphedByMany('App\Models\VehicleRevision', 'revisionable');
    }

    /**
     * One to Many (inverse)
     * Get the user that owns the driver data.
     */
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }

}
