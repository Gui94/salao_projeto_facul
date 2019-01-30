<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FornecedorMarca;

use DB;

class Fornecedor extends Model{
   public $timestamps = false;	
   protected $table = 'fornecedor';
   protected $fillable = ['nome_fornecedor','marca','telefone','id_fornecidor','id_marca_fornecedor'];
   protected $primaryKey = 'id_fornecedor';
   protected $foreignKey = 'id_marca_fornecedor';
   protected $connection = 'pgsql';
   public $incrementing = true;

    public function marcas(){
        return $this->belongsTo('App\FornecedorMarca','id_marca_fornecedor');
    }

    public function ListarFornecedor(){
      return DB::table('fornecedor','marca_fornecedor')->join('marca_fornecedor','fornecedor.id_marca_fornecedor','=','marca_fornecedor.id_marca_fornecedor')->select('fornecedor.id_fornecedor','fornecedor.nome_fornecedor','marca_fornecedor.nome','fornecedor.telefone')->orderBy('fornecedor.nome_fornecedor')->get();
   }

   public function FornecedorDetalhes($id){
      return DB::table('fornecedor','marca_fornecedor')->join('marca_fornecedor','fornecedor.id_marca_fornecedor','=','marca_fornecedor.id_marca_fornecedor')->select('fornecedor.nome_fornecedor','marca_fornecedor.nome','fornecedor.telefone')->first();

    }

    Public function FornecedorId($id){
      return DB::table('fornecedor')->where('id_fornecedor','=',$id)->first();
    }

    Public function ExcluirFornecedor($id){
      return DB::table('fornecedor')->where('id_fornecedor','=',$id)->delete();
    }

    public function CadastrarFornecedor($info){
      return DB::table('fornecedor')->insert($info);
    }

    public function AtualizarFornecedor($id,$info){
      return DB::table('fornecedor')->where('id_fornecedor','=',$id)->update($info);
    }

}