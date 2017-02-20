@extends('layout.principal')

@section('conteudo')
	<h1>Lista de Produtos</h1>
	@if(empty($produtos))

<div class="alert alert-danger">
  Você não tem nenhum produto cadastrado.
</div>

@else

	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th>Detalhes</th>
		</thead>
		<tbody>

    @foreach ($produtos as $produto)
			
		
			<tr class="{{ $produto->quantidade <= 1 ? 'danger' : ''}}">
				<td>{{ $produto->nome}}</td>
				<td>{{ $produto->descricao}}</td>
				<td>{{ $produto->quantidade}}</td>
				<td>
					<a href="/produtos/mostra/{{ $produto->id}}" >
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</a>
					<a href="/produtos/remove/{{ $produto->id}}" >
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
					<a href="/produtos/atualizar/{{ $produto->id}}" >
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</a>
				</td>
				
			</tr>
			
    @endforeach
		</tbody>
	</table>
	
@endif

@if(old('nome'))
<div class="alert alert-success">
  Produto {{old('nome')}} salvo!
</div>
@endif
@stop