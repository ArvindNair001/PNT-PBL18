<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
     // Table Name
     protected $table = 'uploads';
     // Primary Key
     public $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;
     
     public function user(){
         return $this->belongsTo('App\User');
     }
}
