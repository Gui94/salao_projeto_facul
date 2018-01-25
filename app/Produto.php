<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fornecedor;
use App\FornecedorMarca;

class Produto extends Model{
   public $timestamps = false;	
   protected $table = 'produto';
   protected $fillable = array('nome_produto','id_produto','preco','id_fornecedor','id_marca_fornecedor');
   protected $primaryKey = 'id_produto';
   protected $foreignKey = 'id_fornecedor';
   protected $connection = 'pgsql';

   public function fornecedor() {
        return $this->belongsTo('App\Fornecedor','id_fornecedor');
   }

}