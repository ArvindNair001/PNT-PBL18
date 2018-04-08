<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementSkill extends Model
{
     // Table Name
   protected $table = 'requirement_skills';
   // Primary Key
   public $primaryKey = 'id';
   // Timestamps
   public $timestamps = true;
}
