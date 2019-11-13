<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    public function student_subjects()
    {
        return $this->hasMany('student_subjects');
    }
    public function performances()
    {
        return $this->hasMany('performances');
    }
    protected $table='subjects';
    protected $primaryKey = 'subject_id';
     public function students()
    {
        return $this->belongsToMany(students::class);
}
     public function streams()
    {
        return $this->belongsToMany(streams::class);
}
}
