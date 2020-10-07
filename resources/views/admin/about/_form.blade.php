    <div class="input-field">
        <input type="text" name="titulo" class="form-control" value="{{ isset($abouts->titulo) ? $abouts->titulo : '' }}">
    </div><br>
    <div class="input-field">
        <textarea name="texto" class="form-control">
            {{ isset($abouts->texto) ? $abouts->texto : '' }}
        </textarea>
    </div><br>

    <div class="row">
        <div class="file-field input-field col m6 s12">
            <div class="btn">
                <input type="file" name="imagem">
            </div>
            @if(isset($abouts->imagem))
            <img width="120" src="{{ asset($abouts->imagem) }}">
        @endif
        </div>
        
    </div>


