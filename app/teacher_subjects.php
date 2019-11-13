<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher_subjects extends Model
{
    public function teachers()
    {
        return $this->hasMany('App\teachers');
    }
      public function subjects()
    {
        return $this->hasMany('App\subjects');
    }
      public function students()
    {
        return $this->hasMany('App\students');
    }
}
