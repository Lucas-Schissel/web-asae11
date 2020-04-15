@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Cadastro de Clientes</h1>
	</span>
</div>

<div class="text-center mt-5 p-5">
	<form method="post" action="{{ route('usuario_add') }}">
		@csrf
		<input type="text" class="form-control" name="nome" placeholder="Nome">
		<br>
		<input type="text" class="form-control" name="login" placeholder="Login">
		<br>
		<input type="password" class="form-control" name="senha" placeholder="Senha">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Confirmar">
	</form>
</div>

@endsection
