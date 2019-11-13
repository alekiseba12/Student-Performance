<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tscs extends Model
{
    public function teachers()
    {
         return $this->belongsTo('App\teachers');
    }
}
