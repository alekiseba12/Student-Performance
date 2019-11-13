<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    public function tscs()
    {
        return $this->hasOne('App\tscs');
    }
    public function teacher_subjects()
    {
        return $this->hasMany('App\teacher_subjects');
    }
    protected $primaryKey='national_id';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
      public function performances()
    {
        return $this->belongsToMany('App\performances');
    }
}
