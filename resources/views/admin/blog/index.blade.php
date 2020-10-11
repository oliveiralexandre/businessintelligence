@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Painel de Controle')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            
            
          </div>
        </div>
        
        
        
        </div>
      </div>
      
      
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Gerenciar Publicações</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
			<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Título</th>											
						<th>Imagem</th>
						<th>Publicado</th>			
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->titulo }}</td>						
						<td><img width="100" src="{{asset($registro->imagem)}}"></td>
						<td>{{ $registro->publicar }}</td>
						<td>
							<a class="btn btn-fab btn-round btn-success" href="{{ route('admin.blog.editar',$registro->id) }}"><i class="material-icons">edit</i></a>
							
							<a class="btn btn-fab btn-round btn-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.blog.deletar',$registro->id) }}' }"><i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
		<div class="row">
			<a class="btn btn-info" href="{{route('admin.blog.adicionar')}}">Adicionar</a>
		</div>

@endsection
