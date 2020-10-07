
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
            <h2 class="blog-post-title">Contato</h2>
        </div>
    
<!-- Contato -->
<div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ops!</strong> existem alguns problemas com os campos preenchidos.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

         <form action="email.php"  method="post" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text"  name="Nome" class="form-control" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <input type="text" name="Email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="Assunto" class="form-control" placeholder="Assunto" required>
              </div>
              <div class="form-group">
                <textarea name="Mensagem" id="" cols="30" rows="7" class="form-control" placeholder="Mensagem" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-primary py-3 px-5" onclick=msg();>
              </div>
            </form> 
             
    </div>


<!--Section: Contact v.2-->

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
