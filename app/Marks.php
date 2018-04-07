<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
     //table name
    protected $table = 'marks';
     // Primary Key
    public $primaryKey = 'id';
     // Timestamps
    public $timestamps = true;
     
    public function user(){
         return $this->belongsTo('App\User');
    }
}
