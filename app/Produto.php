<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fornecedor;
use App\FornecedorMarca;
use DB;

class Produto extends Model{
   public $timestamps = false;	
   protected $table = 'produto';
   protected $fillable = ['nome_produto','id_produto','preco','id_fornecedor','id_marca_fornecedor'];
   protected $primaryKey = 'id_produto';
   protected $foreignKey = 'id_fornecedor';
   protected $connection = 'pgsql';

   public function fornecedor() {
        return $this->belongsTo('App\Fornecedor','id_fornecedor');
   }

   public function getid($id){
   		return DB::table('produto')->where('id_produto','=',$id)->first();
   }

   public function listar(){
   		return DB::table('produto','fornecedor')->join('fornecedor','produto.id_fornecedor','=','fornecedor.id_fornecedor')->select('produto.*','fornecedor.nome_fornecedor')->orderBy('produto.nome_produto')->get();
   }

   public function updateProduto($id, $request = []){
         return DB::table('produto')->where('id_produto','=',$id)->update($request);
   }

   public function cadastrarProduto($request){
      return DB::table('produto')->insert($request);
   }

   public function deleteProduto($id){
      return DB::table('produto')->where('id_produto','=',$id)->delete();
   }

}