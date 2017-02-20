<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;

class ProdutoController extends Controller{

	/*public function lista(){
		$produtos = DB::select('select * from produtos');
		dd($produtos);
		return '<h1>Lista de Produtos</h1>';
	}*/


	public function lista(){
		$produtos = Produto::all();
		return view('produto.listagem')->with('produtos', $produtos);
	}

	public function mostra($id){
		//$id = Request::route('id', '1');
		$produto = Produto::find($id);
		return view('produto.detalhe')->with('produto', $produto);
	}

	public function novo(){
		return view('produto.formulario')->with('produto', new Produto());
	}


	public function alterar($id){
		return view('produto.formulario')->with('produto', Produto::find($id));
	}

	public function adicionar(){
		/*$params = Request::all();
		$produto = new Produto($params);

		$produto->save();*/

		Produto::create(Request::all());

		return redirect()
					  ->action('ProdutoController@lista')
					  ->withInput(Request::only('nome'));
	}



	public function salvar(){
		$id = Request::input('id');
		if(isset($id)){
			Produto::find($id)->update(Request::all());
		} else {	
			Produto::create(Request::all());
		}

		return redirect()
					  ->action('ProdutoController@lista')
					  ->withInput(Request::only('nome'));
	}


	public function listaJson(){
		$produtos = DB::select('select * from produtos');
		return response()->json($produtos);
	}

	public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
		//return redirect('/produtos');	
		return redirect()->action('ProdutoController@lista');
	}
	
}

