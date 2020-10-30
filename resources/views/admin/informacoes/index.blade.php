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
              <h4 class="card-title">Gerenciar Informações</h4>
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
						<th>Título Fonte</th>
						<th>Url Fonte</th>
						<th>Publicado</th>			
						<th >Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{!! $registro->titulo !!}</td>						
						<td><img width="100" src="{{asset($registro->imagem)}}"></td>
						<td>{!! $registro->titulourl !!}</td>
						<td>{!! $registro->url !!}</td>
						<td align="center">{{ $registro->publicar }}</td>
						<td>
							<a class="btn btn-fab btn-round btn-success" href="{{ route('admin.informacoes.editar',$registro->id) }}"><i class="material-icons">edit</i></a>
							
							<a class="btn btn-fab btn-round btn-danger" href="{{ route('admin.informacoes.deletar',$registro->id) }}"><i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
		<div class="row">
			<a class="btn btn-info" href="{{route('admin.informacoes.adicionar')}}">Adicionar</a>
		</div>

@endsection
