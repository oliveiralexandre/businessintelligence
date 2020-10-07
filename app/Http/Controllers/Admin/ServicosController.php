<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicosController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('admin.servicos.index', compact('servicos'));
	}
	

    public function editar($id)
    {
        $servicos = Servico::find($id);
    	return view('admin.servicos.editar',compact('servicos'));
    }

    public function atualizar(Request $request, $id)
    {

        $dados = $request->all();
    	$servicos = Servico::find($id);
    	$servicos->titulo = trim($dados['titulo']);
    	$servicos->texto = trim($dados['texto']);

    	$file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/servicos/".$id."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$servicos->imagem = $diretorio.'/'.$nomeArquivo;
    	}

    	$servicos->update();

    	\Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.servicos');


    }
}
