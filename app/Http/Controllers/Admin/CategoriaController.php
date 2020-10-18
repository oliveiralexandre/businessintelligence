<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categoria;
    
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index()
    {  
        $registros = Categoria::all();
       
       // $search = $balcao->get('id');
       
        return view('admin.categoria.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.categoria.adicionar');
    }

    public function salvar(Request $request)
    {
        $dataForm = $request->all();  
       //$dataForm['ativo'] = ( !isset($dataForm['ativo']) ) ? 0 : 1;
       
       //Faz o cadastro
       $insert = $this->categoria->create($dataForm);

        Alert::success('Registro criado com sucesso!');
       
        return redirect()->route('admin.categoria');
        
    }

    public function editar($id)
    {
      

        $registro = Categoria::find($id);

    

        return view('admin.categoria.editar',compact('registro'));
        
    }

    public function atualizar(Request $request, $id)
    {
       

        $registro = Categoria::find($id);
        $dados = $request->all();

        $registro->nome = $dados['nome'];
        
        $registro ->update();
        Alert::success('Registro Atualizado com Sucesso!');

        return redirect()->route('admin.categoria');
    }

    public function deletar($id)
    {
        

        Categoria::find($id)->delete();
        Alert::error('Registro deletado com sucesso!');
       
        return redirect()->route('admin.categoria');

    }

}
