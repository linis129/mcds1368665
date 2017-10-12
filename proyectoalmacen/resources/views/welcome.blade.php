<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
                        :::. ALMACEN .::
         </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
         <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">

          <link href="{{asset('images/favicon.ico')}}" rel="shortcut icon">


            <!-- Skitter Styles -->
  <link   href="{{asset('slider/dist/skitter.css')}}"    type="text/css" media="all" rel="stylesheet" />
  
  <!-- Skitter JS -->
  <script type="text/javascript" language="javascript" src="slider/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" language="javascript" src="slider/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" language="javascript" src="slider/dist/jquery.skitter.min.js"></script>
  
  <!-- Init Skitter -->
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {


      $('.skitter-large').skitter({
        numbers: true,
        suffix: '-small',
        width: 1024,
        dots: false
      });

     



    });


  </script>






        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">
                    Inicio
                </a>
                @else
                <a href="{{ url('/login') }}">
                    <i aria-hidden="true" class="fa fa-user fa-2x ">
                    </i>
                    Ingresar
                </a>
               <!--  <a href="{{ url('/register') }}">
                    <i aria-hidden="true" class="fa fa-user-plus fa-2x ">
                    </i>
                </a> -->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ALMACEN
                </div>


                    <div id="content">
      <div class="skitter-large-box">
        <div class="skitter skitter-large">
          <ul>
            <li><a href="#cube"><img src="images/s1.jpg" class="cubeHide" /></a></li>

            <li><a href="#cubeRandom"><img src="images/s2.jpg" class="cubeSize" /></a></li>

            <li><a href="#block"><img src="images/s3.jpg" class="cubeShow" /></a></li>

            <li><a href="#cubeStop"><img src="images/s4.jpg" class="cube" /></a></li> 
          </ul>
        </div>
      </div>
    </div>
                
            </div>
        </div>
    </body>
</html>
