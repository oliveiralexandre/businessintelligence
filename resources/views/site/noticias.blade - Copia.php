
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
            <h2 class="blog-post-title">Notícias</h2>
        </div>

    <!-- Pesquisar -->      
   
    {!! Form::open(['method' => 'GET', 'role' => 'form']) !!}
            <div class="col-md-13">
                {!! Form::text('search', request()->get('search'), ['class' => 'form-control', 'placeholder' => 'Pesquisar']) !!}
              
            </div>
            <div class="col-md-13">
            {!! Form::submit('Pesquisar', ['class' => 'btn btn-block btn btn-dark']) !!}
            </div>
    {!! Form::close() !!}
    
<!-- Noticias -->

        <div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4">
          
          <div class="card-body d-flex flex-column align-items-start">
                @forelse ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong class="d-inline-block mb-2 text-primary">{{ $post->title }}</strong> - <small>by {{ $post->user->name }}</small>

                            <span class="pull-right">
                                {{ $post->created_at->toDayDateTimeString() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{ str_limit($post->body, 200) }}</p>
                            <p>
                                Tags:
                                @forelse ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">No tag found.</span>
                                @endforelse
                            </p>
                            <p>
                                 <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-info">Leia mais...</a><hr/>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Não encontrado!!</div>

                        <div class="panel-body">
                            <p>Desculpe! Nenhuma postagem encontrada.</p>
                        </div>
                    </div>
                @endforelse

                <div align="center">
                    {!! $posts->appends(['search' => request()->get('search')])->links() !!}
                </div>

            </div>

            </div> </div> </div>
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
