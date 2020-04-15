@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Clientes</h1>
	</span>
</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Login</th>
				<th>Operações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($us as $u)
			<tr>
				<td>{{ $u->id }}</td>
				<td>{{ $u->nome }}</td>
				<td>{{ $u->login }}</td>
				<td>
					<a class="btn btn-warning" href="{{ route('usuario_update', [ 'id' => $u->id ]) }}">Alterar</a>
					<a class="btn btn-danger" href="#" onclick="exclui({{ $u->id }})">Excluir</a>
					<a class="btn btn-success" href="{{ route('vendas_cliente', [ 'id' => $u->id ]) }}">Vendas</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-primary m-2 p-2" href="{{ route('usuario_cadastro') }}">Adicionar Novo Cliente</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o usuário de id: " + id + "?")){
			location.href = "/usuario/excluir/" + id;
		}
	}
</script>

@endsection
