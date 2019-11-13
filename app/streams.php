<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class streams extends Model
{
	 public function students()
    {
        return $this->hasMany('students');
    }
    public function performances(){

    	return $this->hasMany('performances');
    }
    protected $primaryKey = 'stream_id';

     public function subjects()
    {
        return $this->belongsToMany(subjects::class);
}
}

