<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoMarca extends Model
{
   public $timestamps = false;	
   protected $table = 'marca_produto';
   protected $fillable = array('nome','id_marca_produto');
   protected $primaryKey = 'id_marca_produto';
   protected $connection = 'pgsql';
   public $incrementing = true;
}