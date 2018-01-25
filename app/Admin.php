<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{

   public $timestamps = false;	
   protected $table = 'admin';
   protected $fillable = array('id_admin','nome','email','senha');
   protected $primaryKey = 'id_admin';
   protected $connection = 'pgsql';





}