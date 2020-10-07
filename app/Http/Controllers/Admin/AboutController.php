<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function editar($id)
    {
        $abouts = About::find($id);
    	return view('admin.about.editar',compact('abouts'));
    }

    public function atualizar(Request $request, $id)
    {

        $dados = $request->all();
    	$abouts = About::find($id);
    	$abouts->titulo = trim($dados['titulo']);
    	$abouts->texto = trim($dados['texto']);

    	$file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/sobre/".$id."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$abouts->imagem = $diretorio.'/'.$nomeArquivo;
    	}

    	$abouts->update();

    	\Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.sobre');


    }
}
