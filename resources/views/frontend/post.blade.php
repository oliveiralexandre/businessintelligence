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
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../css/blog.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 text-center">
          <img src="../img/logo.png" class="d-block w-100" alt="...">
          </div>
          @include('layouts._site._nav')
      </header>

       <!-- Logotipo Slide -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../img/slide.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div><br>

        <div class="blog-post text-center">
            <h2 class="blog-post-title">Notícia ({{ $post->title }})</h2>
        </div>
        <div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4">
          
          <div class="card-body d-flex flex-column align-items-start">
        <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="card-image">
				<a href=""><img src="{{ asset($post->imagem) }}"></a>
			</div>
                    <div class="panel-heading">
                    <strong class="d-inline-block mb-2 text-primary">{{ $post->title }}</strong>
                    </div>

                    <div class="panel-body">
                        <p>{{ $post->body }}</p>
                        <p>
                            Categoria: <span class="label label-success">{{ $post->category->name }}</span> <br>
                            Tags:
                            @forelse ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @empty
                                <span class="label label-danger">No tag found.</span>
                            @endforelse
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div></div></div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
