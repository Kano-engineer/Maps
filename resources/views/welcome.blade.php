<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Maps.Backpackers</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <style>
        body {
        background: url("../image/5.jpg");
        /* background-size: cover; */
        background-attachment: fixed;
        }
        h1 {
  text-shadow: 2px 2px 3px #666666;
  }
    </style>
    </head>
    <body id="page-top" >
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    @if (Route::has('login'))
                      @auth
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">HOME</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">LOGIN</a></li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">REGISTER</a></li>
                        @endif
                      @endauth
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <!-- <header class="masthead"> -->
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 colr="#000000" class="text-uppercase text-white font-weight-bold">Maps.Backpackers</h1>
                       <br>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="/login/guest">GUEST LOGIN</a>
                    </div>
                    
                </div>
            </div>
        <!-- </header> -->
        <!-- About-->
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <link href="{{ asset('css/maps.css') }}" rel="stylesheet" />
</html>
