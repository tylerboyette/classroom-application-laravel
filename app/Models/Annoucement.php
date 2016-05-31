<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annoucement extends Model
{
    /**
     * Attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
      'title', 'message'
    ];

    /**
     * Format the title to keep consistency by
     * capitalizing the first character of each word
     * in the string
     * 
     * @param String $value 
     */
    public function setTitleAttribute($value)
    {
      $value = strtolower($value);
      $this->attributes['title'] = ucwords($value);
    }

    /**
     * Format the message to keep consistency by
     * capitalizing the first character in the 
     * string
     * 
     * @param String $value 
     */
    public function setMessageAttribute($value)
    {
      $this->attributes['message'] = ucfirst($value);
    }

    /**
     * Set the relationship between the Annoucement
     * model and the Course model
     * 
     * @return Response
     */
    public function course()
    {
      return $this->belongsTo('App\Models\Course');
    }
}
