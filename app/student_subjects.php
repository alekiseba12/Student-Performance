<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_subjects extends Model
{
    public function subjects()
    {
        return $this->hasMany('subjects');
    }
    public function students()
    {
        return $this->hasMany('students');
    }
    protected $fillable=['admin_no', 'subject_id',];
     public function streams()
    {
        return $this->hasMany('streams');
    }
}
