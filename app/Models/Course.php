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
        $lowercase = strtolower($value);
        $this->attributes['title'] = ucfirst($lowercase);
    }

    /**
     * The users that belong to this class
     *   
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
