<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller{

	/*public function lista(){
		$produtos = DB::select('select * from produtos');
		dd($produtos);
		return '<h1>Lista de Produtos</h1>';
	}*/


	public function lista(){
		$produtos = DB::select('select * from produtos');
		return view('produto.listagem')->with('produtos', $produtos);
	}

	public function mostra(){
		//$id = Request::input('id', '1');
		$id = Request::route('id', '1');
		$produto = DB::select('select * from produtos where id = ?', [$id]);
		return view('produto.detalhe')->with('produto', $produto[0]);
	}

	public function novo(){
		return view('produto.formulario');
	}

	public function adicionar(){
		$nome = Request::input('nome', '');
		$valor = Request::input('valor', '');
		$quantidade = Request::input('quantidade', '');
		$descricao = Request::input('descricao', '');

		DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
			array($nome, $quantidade, $valor, $descricao));
		//return view('produto.adicionado')->with('nome', $nome);
		//return redirect('/produtos')->withInput();

		return redirect()
					  ->action('ProdutoController@lista')
					  ->withInput(Request::only('nome'));
	}


	public function listaJson(){
		$produtos = DB::select('select * from produtos');
		return response()->json($produtos);
	}
}

