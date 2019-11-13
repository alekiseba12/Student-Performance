<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
   public function students()
    {
          return $this->hasMany('App\students', 'foreign_key');
    }
    public function User()
    {
         return $this->belongsTo('User', 'user_id', 'id');
    }
}
