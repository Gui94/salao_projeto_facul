<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FornecedorMarca extends Model{
   public $timestamps = false;	
   protected $table = 'marca_fornecedor';
   protected $fillable = ['nome','id_marca_fornecedor'];
   protected $primaryKey = 'id_marca_fornecedor';
   protected $connection = 'pgsql';
   public $incrementing = true;


   public function ListarMarca(){
   	return DB::table('marca_fornecedor')->orderBy('nome')->get();
   }

   public function MarcaId($id){
   	return DB::table('marca_fornecedor')->where('id_marca_fornecedor','=',$id)->first();
   }

   public function ExcluirMarca($id){
   	return DB::table('marca_fornecedor')->where('id_marca_fornecedor','=',$id)->delete();
   }

   public function CadastrarMarca($request){
   	return DB::table('marca_fornecedor')->insert($request);
   }

   public function AtualizarMarca($id,$request){
   	return DB::table('marca_fornecedor')->where('id_marca_fornecedor','=',$id)->update($request);
   }
}