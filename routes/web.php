<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Clientes

Route::get('/usuario/cadastro', 'ClienteController@telaCadastro')
	->name('usuario_cadastro');

Route::get('/usuario/alterar/{id}', 'ClienteController@telaAlteracao')
	->name('usuario_update');
	
Route::post('/usuario/adicionar', 'ClienteController@adicionar')
	->name('usuario_add');

Route::post('/usuario/alterar/{id}', 'ClienteController@alterar')
	->name('usuario_alterar');

Route::get('/usuario/excluir/{id}', 'ClienteController@excluir')
	->name('usuario_delete');

Route::get('/usuario/listar', 'ClienteController@listar')
	->name('listar');

//Login

Route::get('/tela_login', 'AppController@tela_login')
	->name('tela_login');

Route::post('/login', 'AppController@login')
	->name('logar');

//Vendas

Route::get('/venda/cadastrar', 'VendaController@telaCadastro')
	->name('venda_cadastro');

Route::post('/venda/adicionar', 'VendaController@adicionar')
	->name('venda_add');

Route::get('/venda/excluir/{id}', 'VendaController@excluir')
	->name('venda_delete');

Route::get('venda/cliente/{id}', 'VendaController@vendasPorCliente')
	->name('vendas_cliente');

