<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * Attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
      'title', 'due_date', 'description'
    ];

    /**
     * Format the title string to keep consistency by capitalizing
     * the first character of each word in a string
     * 
     *
     * @param String $value
     * @return string
     */
    public function setTitleAttribute($value)
    {
      $value = strtolower($value);
      $this->attributes['title'] = ucwords($value);
    }

    /**
     * Format the due date appropriately
     * 
     * @param Date $value 
     * @return Date
     */
    public function setDueDateAttribute($value)
    {
      $this->attributes['due_date'] = $value;
    }

    /**
     * Apply formatting to the description attribute to keep
     * consistency when saved to the database
     * 
     * @param String $value 
     * @return string
     */
    public function setDescriptionAttribute($value)
    {
      $this->attributes['description'] = ucfirst($value);
    }

    /**
     * Set the relationship between the Assignment 
     * model and the Course model
     * 
     * @return Response
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
