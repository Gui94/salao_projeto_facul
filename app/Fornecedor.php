<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FornecedorMarca;

class Fornecedor extends Model{
   public $timestamps = false;	
   protected $table = 'fornecedor';
   protected $fillable = array('nome_fornecedor','marca','telefone','id_fornecidor','id_marca_fornecedor');
   protected $primaryKey = 'id_fornecedor';
   protected $foreignKey = 'id_marca_fornecedor';
   protected $connection = 'pgsql';
   public $incrementing = true;

    public function marcas(){
        return $this->belongsTo('App\FornecedorMarca','id_marca_fornecedor');
    }
}