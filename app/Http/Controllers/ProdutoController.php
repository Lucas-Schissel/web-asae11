<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    function telaCadastro(){
    	return view("tela_cadastro_produto");
    }

    function telaAlteracao($id){
        $pdr = Produto::find($id);

        return view("tela_alterar_produto", [ "u" => $pdr ]);
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

    function alterar(Request $req, $id){
        $pdr = Produto::find($id);

        $nome = $req->input('nome');
        $pdr->nome = $nome;
      
        if ($pdr->save()){
            $msg = "Produto $nome alterado com sucesso.";
        } else {
            $msg = "Produto não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }

    function excluir($id){
        $pdr = Produto::find($id);

        if ($pdr->delete()){
            $msg = "Produto $id excluído com sucesso.";
        } else {
            $msg = "Produto não foi excluído.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    
    }

    function listar(){

        if (session()->has("login")){
            $pdr = Produto::all();
            return view("lista_produtos", [ "us" => $pdr ]);
            
		}else{
            return view('tela_login');
        }
        
    }

    function  produtoPorVenda($id){
		$produto = Produto::find($id);
        return view('lista_vendas',["produto"=>$produto]);
    }

    function nomes(){
        $n = Produto::pluck('nome','id');
        return view('tela_vendas')->with('tipos', $n);
    }


}
