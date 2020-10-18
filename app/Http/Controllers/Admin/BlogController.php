<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Categoria;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{
    private $categoria;
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index(Categoria $categoria)
    {        
        $categoria = DB::table('categorias')->get();
        $registros = Blog::all();
        return view('admin.blog.index',compact('registros', 'categoria'));
    }

    public function adicionar(Categoria $categoria)
    {
        $categorias = DB::table('categorias')->get();
        return view('admin.blog.adicionar',compact('categorias'));
    }

    public function salvar(Request $request)
    {
        

        $dados = $request->all();

        $registro = new Blog();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->publicar= $dados['publicar'];
        $registro->categoria_id= $dados['categoria_id'];

       


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
      
        $categorias = Categoria::all();
        $registro = Blog::find($id);

    

        return view('admin.blog.editar',compact('registro', 'categorias'));
        
    }

    public function atualizar(Request $request, $id)
    {
       

        $registro = Blog::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];        
        $registro->publicar= $dados['publicar'];
        $registro->categoria_id= $dados['categoria_id'];
        
          

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
