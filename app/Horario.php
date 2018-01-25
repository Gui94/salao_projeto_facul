<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
   public $timestamps = false;	
   protected $table = 'horario';
   protected $fillable = array('id_horario','horario');
   protected $primaryKey = 'id_horario';
   protected $connection = 'pgsql';


}
