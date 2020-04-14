<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AppController extends Controller
{
    function tela_login(){
    	return view('tela_login');
    }

    function login(Request $req){
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$cli = Cliente::where('login', '=', $login)->first();

    	if ($cli and $cli->senha == $senha){
    		return redirect()->route('listar');
    	} else {
			return view("resultado", ["mensagem" => "Usuário ou senha inválidos. Tente cadastrar um usuario"]);
    	}
    }
}
