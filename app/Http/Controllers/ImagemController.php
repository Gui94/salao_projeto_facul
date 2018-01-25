<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller {
	    /*
    CONTROLLER DE IMAGENS,IRA MOSTRAR NA TELA AS IMAGENS DOS SERVIÇOS CADASTRADAS NO BANCO DE DADOS
    DESENVOLVIDO PELO PROFESSOR ADEMIR MAZER JR,UTILIZADO NO PROJETO SHOPPVEL
    */
    function getImagemFile($nome) {
        $imagem = Storage::disk('public')->get($nome);
        return response($imagem,200)->header('Content-Type', 'image/jpeg');
    }

}
