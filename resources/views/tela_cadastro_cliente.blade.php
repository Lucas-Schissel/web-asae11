@extends('template')

@section('conteudo')
<div class="text-center">
	<h1>Cadastro de usuário</h1>
	<form method="post" action="{{ route('usuario_add') }}">
		@csrf
		<input type="text" class="form-control" name="nome" placeholder="Nome">
		<br>
		<input type="text" class="form-control" name="login" placeholder="Login">
		<br>
		<input type="password" class="form-control" name="senha" placeholder="Senha">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
	</form>
</div>
@endsection
