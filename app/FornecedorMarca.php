<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FornecedorMarca extends Model
{
   public $timestamps = false;	
   protected $table = 'marca_fornecedor';
   protected $fillable = array('nome','id_marca_fornecedor');
   protected $primaryKey = 'id_marca_fornecedor';
   protected $connection = 'pgsql';
   public $incrementing = true;
}