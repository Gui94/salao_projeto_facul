<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Servico extends Model
{
   public $timestamps 	 = false;	
   protected $table 	 = 'servico';
   protected $fillable   = ['nome_servico','preco','imagem','promocao','preco_promocao','descricao','hora','minuto','id_servico'];
   protected $primaryKey = 'id_servico';
   protected $connection = 'pgsql';

   public function listar(){
   	$servico = DB::table('servico')->orderBy('nome_servico')->get();
   	return $servico;
   }

   public function getId($id){
   	$servico = DB::table('servico')->where('id_servico','=',$id)->first();
    return $servico;
   }


}
