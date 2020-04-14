@extends('template')

@section('conteudo')
<h1>Vendas do usuario {{ $cliente->nome}}</h1>
@if (count($cliente->vendas) >0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Venda</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cliente->vendas as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->valor}}</td>
            <td>
			    <a class="btn btn-danger" href="#" onclick="exclui({{ $v->id }})">Excluir</a>
			</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
	function exclui(id){
		if (confirm("Deseja excluir a venda de id: " + id + "?")){
			location.href = "/venda/excluir/" + id;
		}
	}
</script>
@else
<div class="alert alert-danger">
   <h3> Usuario nao possui vendas </h3>
</div>
@endif
@endsection