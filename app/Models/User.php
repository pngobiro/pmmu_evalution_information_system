<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'phone_number',
        'pj_number'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
      
        return $this->first_name . " ". $this->last_name;
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Admin')
            {
                return true;
            }
        }

        return false;
    }

    public function isSuperAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Super Admin')
            {
                return true;
            }
        }

        return false;
    }

    public function isUser()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'User')
            {
                return true;
            }
        }

        return false;
    }

    // user has role to access the resource

    public function hasRole($role)
    {
        
        if ($this->roles()->where('name', $role)->first())
        {
            return true;
        }

        return false;
    }

    
    
}
