
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Business Intelligence</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 text-center">
            <img src="img/logo.png" class="d-block w-100" alt="...">
          </div>
          @include('layouts._site._nav')
      </header>

       <!-- Logotipo Slide -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/slide.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div><br>

        <div class="blog-post text-center">
            <h2 class="blog-post-title">Nossos Serviços</h2>
        </div>

   
    
<!-- Noticias -->

<div class="row section">
@foreach($servicos as $servico)	
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href=""><img src="{{ asset($servico->imagem) }}"></a>
			</div>
            <div class="panel-heading">
                        <strong class="d-inline-block mb-2 text-primary">{{ $servico->titulo }}</strong><br>
                        
                        </div>
			<div class="card-content">
			<p>{{ str_limit($servico->texto, 100) }}</p>
				
				
				
			</div>
            <p>
               <a href="{{ url("/servicos/{$servico->id}") }}" class="btn btn-sm btn-info">Leia mais...</a><hr/>
            </p>
                         
		</div>
        
	</div>
@endforeach


</div>
<br>
                <div>
                    {!! $servicos->appends(['search' => request()->get('search')])->links() !!}
                </div>
                    
    <!-- Fim Noticias -->

    <footer class="blog-footer bg-dark">
   
    © 2020 Copyright Business Intelligence
    <a class="grey-text text-lighten-4 right" href=""><i class="material-icons"></i></a>
    </div>
  </div>
      </div>

      
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
