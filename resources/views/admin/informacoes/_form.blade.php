<div class="input-field col m6 s12">

<div class="form-group input-field">
    <label>Título</label><br>
	  <textarea name="titulo" class="ckeditor form-control">
        {{ isset($registro->titulo) ? $registro->titulo : '' }}
  	</textarea>
</div>
<br>
<div class="form-group input-field">
    <label>Descrição</label><p><br>
	  <textarea name="descricao" id="editor1" class="ckeditor form-control" rows="5">
    {!! isset($registro->descricao) ? $registro->descricao : '' !!}
         
  	</textarea></p>
</div>

<div class="form-group input-field">
    <label>Título Fonte</label>
	  <textarea name="titulourl" class="form-control">
        {{ isset($registro->titulourl) ? $registro->titulourl : '' }}
  	</textarea>
</div>

<div class="form-group input-field">
    <label>Url Fonte</label>
	  <textarea name="url" class="form-control">
        {{ isset($registro->url) ? $registro->url : '' }}
  	</textarea>
</div>





<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn btn-info">
		<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		
	</div>
	<div class="col m6 s12">
	@if(isset($registro->imagem))
		<img width="120" src="{{ asset($registro->imagem) }}">
	@endif
	</div>
</div>


<div class="input-field">
    <select name="publicar">
        <option value="nao" {{(isset($registro->publicar) && $registro->publicar == 'nao'  ? 'selected' : '')}}>Não</option>
        <option value="sim" {{(isset($registro->publicar) && $registro->publicar == 'sim'  ? 'selected' : '')}}>Sim</option>
    </select>
    <label>Publicar?</label>
</div>












