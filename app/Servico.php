<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
   public $timestamps = false;	
   protected $table = 'servico';
   protected $fillable = array('nome_servico','preco','imagem','promocao','preco_promocao','descricao','hora','minuto','id_servico');
   protected $primaryKey = 'id_servico';
   protected $connection = 'pgsql';


}
