<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;


class Relatorio extends Model{
   public $timestamps = false;	
   protected $table = 'financeiro_relatorio';
   protected $fillable = array('id_relatorio','data','fundocaixa_totaldia','saida_dia','resultado');
   protected $primaryKey = 'id_relatorio';
   protected $connection = 'pgsql';
}