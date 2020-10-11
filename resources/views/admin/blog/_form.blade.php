<div class="input-field col m6 s12">

<div class="form-group">
    <label for="exampleFormControlTextarea1">Título</label>
    <textarea class="form-control" name="titulo" id="exampleFormControlTextarea1" rows="3" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}"></textarea>
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}"></textarea>
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




