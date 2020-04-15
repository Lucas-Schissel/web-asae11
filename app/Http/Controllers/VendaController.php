<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

class VendaController extends Controller
{
    function telaCadastro(){
        $cliente = Cliente::all();

        return view ("tela_vendas",
            ["usuario"=>$cliente]);
    }
	
    function adicionar(Request $req){
    	$valor = $req->input('valor');
        $id_usuario = $req->input('id_usuario');
    	
    	$cli = new Venda();
    	$cli->id_usuario = $id_usuario;
    	$cli->valor = $valor;
    	

    	if ($cli->save()){
    		$msg = "Venda efetuada com sucesso.";
    	} else {
    		$msg = "Venda nao efetuada.";
    	}

        return view("resultado", [ "mensagem" => $msg]);
	}
	
	function excluir($id){
		$vnd = Venda::find($id);
		$vnd->delete();
		
		return 	VendaController::vendasPorCliente($id);
  
    }

    function  vendasPorCliente($id){
        $cli = Cliente::find($id);
        return view('lista_vendas', ["cliente" => $cli]);
    }
}
