<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Informacoes;
use App\Models\Category;
use App\Models\Categoria;
use RealRashid\SweetAlert\Facades\Alert;


class InformacoesController extends Controller
{
    private $informacoes;
    public function __construct(Informacoes $informacoes)
    {
        $this->informacoes = $informacoes;
    }

    public function index(Informacoes $informacoes)
    {        
        $informacoes = DB::table('informacoes')->get();
        $registros = Informacoes::all();
        return view('admin.informacoes.index',compact('registros', 'informacoes'));
    }

    public function adicionar(Informacoes $informacoes)
    {
        $informacoes = DB::table('informacoes')->get();
        return view('admin.informacoes.adicionar',compact('informacoes'));
    }

    public function salvar(Request $request)
    {
        

        $dados = $request->all();

        $registro = new Informacoes();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->titulourl = $dados['titulourl'];
        $registro->url = $dados['url'];
        $registro->publicar= $dados['publicar'];
       

       


        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/informacoes/".str_slug($dados['titulo'],'_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}
        
        
        $registro->save();

        Alert::success('Registro criado com sucesso!');
       
        return redirect()->route('admin.informacoes');
        
    }

    public function editar($id)
    {
      
        $informacoes = Informacoes::all();
        $registro = Informacoes::find($id);

    

        return view('admin.informacoes.editar',compact('registro', 'informacoes'));
        
    }

    public function atualizar(Request $request, $id)
    {
       

        $registro = Informacoes::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];  
        $registro->titulourl = $dados['titulourl'];
        $registro->url = $dados['url'];      
        $registro->publicar= $dados['publicar'];
        
          

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/informacoes/".str_slug($dados['titulo'],'_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}

        
        $registro ->update();
        Alert::success('Registro Atualizado com Sucesso!');

        return redirect()->route('admin.informacoes');
    }

    public function deletar($id)
    {
        

        Informacoes::find($id)->delete();
        Alert::error('Registro deletado com sucesso!');
       
        return redirect()->route('admin.informacoes');

    }
}
