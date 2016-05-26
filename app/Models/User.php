<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role'
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
     * Capitalize the first character of the first name attribute
     * to keep consistency
     * 
     * @param string $value 
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * Capitalize the first character of the last name attribute
     * to keep consistency
     * 
     * @param string $value 
     * @return string
     */
    public function setLastNameAttribute($value) 
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    /**
     * Make the email address all lowercase to keep consistency
     * 
     * @param string $value 
     * @return string
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }
}
