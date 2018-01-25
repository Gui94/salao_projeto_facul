<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
   public $timestamps = false;	
   protected $table = 'item_pedido';
   protected $fillable = array('id_servico','id_item','quant_pessoas','preco_unitario');
   protected $primaryKey = 'id_item';
   protected $foreignKey = 'pedido_id';
   protected $connection = 'pgsql';

    public function pedido() {
        return $this->belongsTo(Pedido::class);
    }
    
    public function servico() {
        return $this->belongsTo(Servico::class);
    }
}
