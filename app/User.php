<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'idUserType', 'idStatus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'idStatus' => 1,
        'idUserType' => 1
    ];

    /**
     * One to One
     * Get the driver record associated with the user.
     */
    public function driver()
    {
        return $this->hasOne('App\Models\Driver', 'idUser');
    }

    /**
     * One to Many (inverse)
     * Get the userType that owns the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'idUserType');
    }

    /**
     * One to Many (inverse)
     * Get the Status that owns the user.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'idStatus');
    }

    /**
     * One to One
     * Get the Person record associated with the user.
     */
    public function person()
    {
        return $this->hasOne('App\Models\Person', 'idUser');
    }

    /**
     * Get the service requests for the user.
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'user_id');
    }

    /**
     * Get the user's document type.
     * NOT READY - ANDRES
     */
    /*
    public function carOwner()
    {
        return $this->hasOneThrough(
            'App\Models\DocumentType',
            'App\Models\Person',
            'idUser', // Foreign key on persons table...
            'idDocumentType', // Foreign key on document type table...
            'id', // Local key on mechanics table...
            'id' // Local key on cars table...
        );
    }
    */
}
