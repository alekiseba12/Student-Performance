<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
     public function performances(){

    	return $this->belongsTo('performances');
    }
    protected $primaryKey='exam_code';
}
