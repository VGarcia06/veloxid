<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
