<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    public function performances()
    {
        return $this->hasMany('performances');
    }
    protected $table='students';
    protected $primaryKey = 'admin_no';
     public function subjects()
    {
        return $this->belongsToMany(subjects::class);
    }
    public function profiles()
    {
         return $this->belongsTo('App\profiles','foreign_key');
}
}

