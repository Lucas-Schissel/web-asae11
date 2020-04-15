<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AppController extends Controller
{
    function tela_login(){
		if (session()->has("login")){
			return redirect()->route('listar');
		}
			return view('tela_login');

    }

    function login(Request $req){
    	$login = $req->input('login');
		$senha = $req->input('senha');
		

    	$cli = Cliente::where('login', '=', $login)->first();

    	if ($cli and $cli->senha == $senha){

			$variaveis = ["login" => $login];
			session($variaveis);

    		return redirect()->route('listar');
    	} else {
			return view("resultado", ["mensagem" => "Usuário ou senha inválidos. Tente cadastrar um usuario"]);
    	}
	}

	function logout(){
		session()->forget("login");
		return view('tela_login');
	}

	static function verifica(){
		if (session()->has("login")){
			return redirect()->route('listar');
		}
			return view('tela_login');
		
	}
}
