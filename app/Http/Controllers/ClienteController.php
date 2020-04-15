<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
    	return view("tela_cadastro_cliente");
    }

    function telaAlteracao($id){
        $cli = Cliente::find($id);

        return view("tela_alterar_cliente", [ "u" => $cli ]);
    }

    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$cli = new Cliente();
    	$cli->nome = $nome;
    	$cli->login = $login;
    	$cli->senha = $senha;

    	if ($cli->save()){
    		$msg = "Cliente $nome adicionado com sucesso.";
    	} else {
    		$msg = "Cliente não cadastrado.";
    	}

        return view("resultado", [ "mensagem" => $msg]);
    }

    function alterar(Request $req, $id){
        $cli = Cliente::find($id);

        $nome = $req->input('nome');
        $login = $req->input('login');
        $senha = $req->input('senha');

        $cli->nome = $nome;
        $cli->login = $login;
        $cli->senha = $senha;

        if ($cli->save()){
            $msg = "Cliente $nome alterado com sucesso.";
        } else {
            $msg = "Cliente não foi alterado.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }

    function excluir($id){
        $cli = Cliente::find($id);

        if ($cli->delete()){
            $msg = "Usuário $id excluído com sucesso.";
        } else {
            $msg = "Usuário não foi excluído.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    
    }

    function listar(){

        if (session()->has("login")){
            $cli = Cliente::all();

            return view("lista", [ "us" => $cli ]);
            
		}else{
            return view('tela_login');
        }
        
    }

    function nomes(){
        $n = Cliente::pluck('nome','id');
        return view('tela_vendas')->with('tipos', $n);
    }
   

}
