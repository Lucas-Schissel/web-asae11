@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Venda para Clientes</h1>
	</span>
</div>

<div class="text-center mt-5 p-5">
	<form method="post" action="{{ route('venda_add') }}">
		@csrf
		<select name="id_usuario" class="form-control">
        @foreach ($usuario as $u)
        <option value="{{ $u->id}}">{{$u->nome}}</option>
        @endforeach
    	</select>
		<br>
		<input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
	</form>
</div>

@endsection