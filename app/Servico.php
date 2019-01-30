<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Servico extends Model
{
   public $timestamps 	 = false;	
   protected $table 	 = 'servico';
   protected $fillable   = ['nome_servico','preco','imagem','promocao','preco_desconto','descricao','id_servico'];
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

   public function servicodelete($id){
     $servico = DB::table('servico')->where('id_servico','=',$id);
     $servico_selecionado = $servico->first();
     $caminho = 'imagens_servicos/'.$servico_selecionado->imagem;
     unlink($caminho);
     $servico->delete();
   }

   public function deleteimagem($id){
     $servico = DB::table('servico')->where('id_servico','=',$id);
     $servico_selecionado = $servico->first();
     $caminho = 'imagens_servicos/'.$servico_selecionado->imagem;
     unlink($caminho);
     $id_array = ['id_servico'=>$id,'imagem'=>null];
     $servico->update($id_array);
   }

   public function servicoinsert($servico){
    return DB::table('servico')->insert($servico);
   }

   public function getimagem($id){
    return DB::table('servico')->select('imagem')->where('id_servico','=',$id)->first();
   }

   public function servicoatualizar($id,$servico){
    return DB::table('servico')->where('id_servico','=',$id)->update($servico);
   }

}
