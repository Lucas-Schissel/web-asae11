<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    function telaCadastro(){
    	return view("tela_cadastro_produto");
    }

    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	
    	$pdr = new Produto();
    	$pdr->nome = $nome;

    	if ($pdr->save()){
    		$msg = "Produto $nome adicionado com sucesso.";
    	} else {
    		$msg = "Produto não cadastrado.";
    	}

        return view("resultado", [ "mensagem" => $msg]);
    }
}
