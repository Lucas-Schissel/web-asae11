<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            session()->forget("login");
        }
    	return view("tela_cadastro_cliente");
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $cli = Cliente::find($id);
            return view("tela_alterar_cliente", [ "u" => $cli ]);
        }
        return view('tela_login');
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
            echo  "<script>alert('Cliente $nome cadastrado com Sucesso!');</script>";
            return view('tela_login');
    	} else {
    		echo  "<script>alert('Cliente $nome nao foi cadastrado!');</script>";
            return view('tela_login');
        }

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
        if (session()->has("login")){
                $cli = Cliente::find($id);
                if ($cli->delete()){
                    $msg = "Usuário $id excluído com sucesso.";
                } else {
                    $msg = "Usuário não foi excluído.";
                }

                return view("resultado", [ "mensagem" => $msg]);
        }else{
        return view('tela_login');
        }
    
    }

    function listar(){
        if (session()->has("login")){
            $cli = Cliente::all();
            return view("lista", [ "us" => $cli ]);
		}else{
            return view('tela_login');
        }
        
    }

}
