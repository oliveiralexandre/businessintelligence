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
              <h4 class="card-title">Gerenciar Publicações - Adicionar</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body table-responsive">
			<div class="row">
			<table>
			<div class="container">
	
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.blog.salvar') }}" method="post" enctype="multipart/form-data">

		{{csrf_field()}}
		@include('admin.blog._form')

		<button class="btn btn-info">Adicionar</button>

			
		</form>
			
	</div>
	
</div>	
			
 
@endsection
