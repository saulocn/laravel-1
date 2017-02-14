@extends('layout.principal')

@section('conteudo')
  
<form method="POST" action="/produtos/adicionar">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<div class="form-group">
		<label>Nome</label>
		<input name="nome"  type="text" class="form-control" />
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" type="text" class="form-control" />
	</div>
	<div class="form-group">
		<label>Quantidade</label>
    	<input type="number"  name="quantidade" class="form-control"/>
	</div>

	<div class="form-group">
		<label>Descrição</label>
		<textarea name="descricao" class="form-control"></textarea>
	</div>

  	<button class="btn btn-primary" type="submit">Adicionar</button>

</form>	
@stop