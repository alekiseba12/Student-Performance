<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class performances extends Model
{
   public function subjects()
    {
        return $this->hasMany('subjects');
    }
    public function students()
    {
        return $this->hasMany('students');
    }
     public function streams()
    {
        return $this->hasMany('streams');
    }
    protected $primaryKey = 'id';
    public function exams(){

    return $this->hasMany('exams');
    }
        public function teachers()
    {
        return $this->belongsToMany('App\teachers');
    }
     public function User()
    {
        return $this->belongsToMany('App\User');
    }
    public function getMarksAtrribute(){
        
    }
}
