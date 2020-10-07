<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destaque;

class DestaquesController extends Controller
{
	private $destaque;

	public function __construct(Destaque $destaque)
    {
        $this->destaque = $destaque;
	}
	
    public function index()
    {
        $destaques = Destaque::all();
        return view('admin.destaques.index', compact('destaques'));
	}
	
	public function create($id)
    {
       
    }

    public function store(Request $request, $id)
    {

        


    }
	

    public function editar($id)
    {
        $destaques = Destaque::find($id);
    	return view('admin.destaques.editar',compact('destaques'));
    }

    public function atualizar(Request $request, $id)
    {

        $dados = $request->all();
    	$destaques = Destaque::find($id);
    	$destaques->titulo = trim($dados['titulo']);
    	$destaques->texto = trim($dados['texto']);

    	$file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/destaques/".$id."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$destaques->imagem = $diretorio.'/'.$nomeArquivo;
    	}

    	$destaques->update();

    	\Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.destaques');


    }
}
