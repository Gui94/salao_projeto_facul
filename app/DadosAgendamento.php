<?php

namespace App;

use App\Servico;

/**
 * CarrinhoItem não é um modelo do tipo Eloquent, e sim um modelo para ser utilizado
 * pelo carrinho para armazenar algumas propriedades, note que elas estão public
 * por não necessitarem de muita lógica neste exemplo
 */
class DadosAgendamento {
    public $data_agendamento;
    public $horario;


}