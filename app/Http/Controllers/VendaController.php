<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

class VendaController extends Controller
{
    function telaCadastro(){
		if (session()->has("login")){
			$cliente = Cliente::all();
			$produto = Produto::all();
			return view ("tela_vendas",["produto"=>$produto],["usuario"=>$cliente]);
		}
			return view('tela_login');		
    }
	
    function adicionar(Request $req){
    	$valor = $req->input('valor');
		$id_usuario = $req->input('id_usuario');
		$id_produto = $req->input('id_produto');
    	
		$cli = new Venda();
		$cli->id_produto = $id_produto;
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

    function vendasPorCliente($id){
		if (session()->has("login")){
			$cli = Cliente::find($id);
			$produto = Produto::all();
       		return view('lista_vendas',["produto"=>$produto],["cliente" => $cli]);
		}
		return view('tela_login');
	}

	function todasVendas(){
		if (session()->has("login")){
			$vendas = Venda::all();
			$produto = Produto::all();
			$cliente = Cliente::all();
			return view('lista_todas_vendas')->with(compact('produto','cliente','vendas'));
		}
		return view('tela_login');
	}


}
