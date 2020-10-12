<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{
    public function index()
    {        
        $registros = Blog::all();
        return view('admin.blog.index',compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.blog.adicionar');
    }

    public function salvar(Request $request)
    {
        

        $dados = $request->all();

        $registro = new Blog();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->publicar= $dados['publicar'];
       


        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/blog/".str_slug($dados['titulo'],'_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}
        
        
        $registro->save();

        Alert::success('Registro criado com sucesso!');
       
        return redirect()->route('admin.blog');
        
    }

    public function editar($id)
    {
      

        $registro = Blog::find($id);

    

        return view('admin.blog.editar',compact('registro'));
        
    }

    public function atualizar(Request $request, $id)
    {
       

        $registro = Blog::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];        
        $registro->publicar= $dados['publicar'];
          

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/blog/".str_slug($dados['titulo'],'_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}

        
        $registro ->update();
        Alert::success('Registro Atualizado com Sucesso!');

        return redirect()->route('admin.blog');
    }

    public function deletar($id)
    {
        

        Blog::find($id)->delete();
        Alert::error('Registro deletado com sucesso!');
       
        return redirect()->route('admin.blog');

    }
}
