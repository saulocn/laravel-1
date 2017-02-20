@extends('layout.principal')

@section('conteudo')
  
<form method="POST" action="/produtos/salvar">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<input name="id"  type="hidden"  value="{{$produto->id}}" />
	<div class="form-group">
		<label>Nome</label>
		<input name="nome"  type="text" class="form-control"  value="{{$produto->nome}}" />
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" type="text" class="form-control"  value="{{$produto->valor}}" />
	</div>
	<div class="form-group">
		<label>Quantidade</label>
    	<input type="number"  name="quantidade" class="form-control"  value="{{$produto->quantidade}}"/>
	</div>

	<div class="form-group">
		<label>Descrição</label>
		<textarea name="descricao" class="form-control">{{$produto->descricao}}</textarea>
	</div>

  	<button class="btn btn-primary" type="submit">Adicionar</button>

</form>	
@stop