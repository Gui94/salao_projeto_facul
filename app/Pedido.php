<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Servico;
use App\Validator;

class Pedido extends Model
{
  public $timestamps = false;	
  protected $table = 'pedido';
  protected $fillable = array('id_pedido','data_agendamento','total','pago',
  'formas_pagamento','id','horario','hora_inicio','hora_fim','hora_total','lista_espera','confirmacao','cancelado');
  protected $foreignKey = 'id';
  protected $primaryKey = 'id_pedido';
  protected $connection = 'pgsql';

  public function users(){
   	return $this->belongsTo('\App\User','id');
  }

  public function itens() {
    return $this->hasMany(ItemPedido::class);
  }

  public function servicos(){
    return $this->hasMany(Servico::class);
  }


}