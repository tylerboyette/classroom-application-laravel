<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'subject', 'title', 'course', 'section'
    ];

    /** 
     * Capitalizes the subject to keep consistency
     * 
     * @param String $value 
     * @return string
     */
    public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = strtoupper($value);
    }

    /**
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     * 
     * @param String $value
     * @return string
     */
    public function setTitleAttribute($value) 
    {
        $this->attributes['title'] = ucwords($value);
    }

    /**
     * Users that belong to this class
     *   
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Assignments that belong to this class
     * 
     */
    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    /**
     * Annoucements that belong to this class
     * 
     * @return Response
     */
    public function annoucements()
    {
        return $this->hasMany('App\Models\Annoucements');
    }
}
