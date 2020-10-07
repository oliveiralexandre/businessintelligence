@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">




	<h2 class="center">Editar Destaques</h2>
	<form action="{{ route('admin.destaques.atualizar',$destaques->id) }}" method="post" enctype="multipart/form-data">

		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		@include('admin.destaques._form')

		<button class="btn btn-info">Atualizar</button>

			
		</form>
	 	
	</div>
	
		
			

	

	

@endsection