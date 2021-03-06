<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lemonade Band</title>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/lightbox.css')}}" rel="stylesheet">
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components\bootstrap-datepicker\dist\css\bootstrap-datepicker.css')}}" rel="stylesheet">
  <link id="css-preset" href="{{asset('css/presets/preset1.css')}}" rel="stylesheet">
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">


  <style>
    .vid-list-container {
      width: 92%;
      overflow: hidden;
      margin-top: 20px;
      margin-left: 4%;
      padding-bottom: 20px;
    }

    .vid-list {
      width: 1344px;
      position: relative;
      top: 0;
      left: 0;
    }

    .vid-item {
      display: block;
      width: 148px;
      height: 148px;
      float: left;
      margin: 0;
      padding: 10px;
    }

    .thumb {
      overflow: hidden;
      height: 84px;
    }

    .thumb img {
      width: 100%;
      position: relative;
      top: -13px;
    }

    .vid-item .desc {
      color: #21A1D2;
      font-size: 15px;
      margin-top: 5px;
    }

    .arrows {
      position: relative;
      width: 100%;
    }

    .arrow-left {
      color: #fff;
      position: absolute;
      background: #777;
      padding: 15px;
      left: -25px;
      top: -130px;
      z-index: 99;
      cursor: pointer;
    }

    .arrow-right {
      color: #fff;
      position: absolute;
      background: #777;
      padding: 15px;
      right: -25px;
      top: -130px;
      z-index: 100;
      cursor: pointer;
    }

    @media (max-width: 624px) {
      .arrows {
        position: relative;
        margin: 0 auto;
        width: 96px;
      }
      .arrow-left {
        left: 0;
        top: -20px;
      }

      .arrow-right {
        right: 0;
        top: -20px;
      }


    }

    #floating-button {
      width: 95px;
      height: 45px;
      /* border-radius: 50%; */
      background: #fcfcbc;
      position: fixed;
      top: 30px;
      right: 30px;
      cursor: pointer;
      box-shadow: 0px 2px 5px #666;
    }
  </style>
</head>
<!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader">
    <i class="fa fa-circle-o-notch fa-spin"></i>
  </div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <?php $x=0;?> @foreach($event as $event)
        <div class="item   <?php if($x==0)
        {
          echo 'active';
        }
      ?>" style="background-image: url({{asset('images/event/'.$event->photo)}}">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">{{$event->name}} |
              <span>Lemonade</span>
            </h1>
            <p class="animated fadeInRightBig">
              <?php echo date('d F Y ', strtotime($event->startevent)); ?> </p>
            <!-- <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Show</a> -->
          </div>
        </div>
        <?php $x++;
      ?> @endforeach

        <a class="left-control" href="#home-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="right-control" href="#home-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>

        <a id="tohash" href="#services">
          <i class="fa fa-angle-down"></i>
        </a>

      </div>
      <!--/#home-slider-->


      <div id="floating-button">

        @if(auth::check())
        <a href="{{url('admin/')}}">
          <h4 class="text-center" id="login">Book Event</h4>
        </a>

        @else
        <a href="{{url('login')}}">
          <h4 class="text-center" id="login">LOGIN</h4>
        </a>
        @endif

      </div>
      <div class="main-nav" style="background-color:#fcfcbc;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
              <h1>
                <img class="img-responsive" src="{{asset('images/logo.png')}}" alt="logo">
              </h1>
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="scroll active">
                <a href="#home">Home</a>
              </li>
              <li class="scroll">
                <a href="#services">Schedule</a>
              </li>
              <li class="scroll">
                <a href="#about-us">About Us</a>
              </li>
              <li class="scroll">
                <a href="#portfolio">Events</a>
              </li>
              <!-- <li class="scroll"><a href="#blog">Blog</a></li> -->
              <li class="scroll">
                <a href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/#main-nav-->
  </header>
  <!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

        <div class="text-center col-sm-12">
          <h2>Our Schedule</h2>


        </div>
      </div>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />


      <div class="panel panel-primary">

        <div class="panel-heading">

        </div>

        <div class="panel-body">

          {!! $calendar->calendar() !!} {!! $calendar->script() !!}

        </div>



  </section>
  <!--/#services-->
  <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Lemonade Band</h2>
            <p>
                Lemonade Band merupakan band entertainment Surabaya yang telah melayani banyak event seperti acara pernikahan, acara gathering, sweet 17th, dll.
                <p>    Kami memberikan penampilan terbaik dan entertainment yang berbeda.
                    <p>banyak tersedia paket yang kami tawarkan untuk memeriahkan acara anda. Happy Customer</p>

              <h2 class="text-center">  Rating :
                <?php echo number_format((float)$avgStar, 2, '.', '');  ?>
              </h2>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <img src="{{asset('images/event/img_5a673d39c2cf9.jpg')}}" class="rounded" width="550" height="300" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/#about-us-->

  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Our Last Event</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">


          <div class="container">

            <!-- THE YOUTUBE PLAYER -->
            <div class="vid-container embed-responsive embed-responsive-16by9">
              <iframe id="vid_frame" class="embed-responsive-item" src="
        <?php echo str_replace('autoplay=1','autoplay=0',$yutub->url) ?>" frameborder="0"></iframe>
            </div>

            <!-- THE PLAYLIST -->
            <div class="vid-list-container">
              <div class="vid-list">
                @foreach($allyutub as $videos)

                <div class="vid-item" onclick="document.getElementById('vid_frame').src='{{$videos->url}}'">
                  <div class="thumb">
                    <img src="{{$videos->image}}">
                  </div>
                  <div class="desc">

                    {{$videos->title}}
                  </div>
                </div>
                @endforeach

              </div>
            </div>

            <!-- LEFT AND RIGHT ARROWS -->
            <div class="arrows">
              <div class="arrow-left">
                <i class="fa fa-chevron-left fa-lg"></i>
              </div>
              <div class="arrow-right">
                <i class="fa fa-chevron-right fa-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/#portfolio-->
  <section class="three">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      {{--  <ol class="carousel-indicators" style="color:black">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="4" class=""></li>
      </ol>  --}}

      <!-- Wrapper for slides -->



      <div class="carousel-inner">
        <?php $x=0; ?>
        @for($i=$x;$i<sizeof($rate);$i++)

        @if($x<sizeof($rate))
        <div class="item
        @if($x==0)
        active
        @endif

        " >
          <div style="margin:0px 30%;">
           <div class=" col-md-5">
            <div class="card text-center well well-lg" >
              <div class="card-body">
                @for($j=0;$j<$rate[$x]->rate;$j++)
                <span class="glyphicon glyphicon-star"></span>
                @endfor

                <p class="card-text">{{$rate[$x]->comment}}.</p>

                <?php $x++ ?>

              </div>
            </div>
           </div>
           @endif

           @if($x<sizeof($rate))

           <div class=" col-md-5">
            <div class="card text-center  well well-lg" >
              <div class="card-body">
                @for($k=0;$k<$rate[$x]->rate;$k++)
                <span class="glyphicon glyphicon-star"></span>
                @endfor
                <p class="  -text">{{$rate[$x]->comment}}.</p>
                <?php $x++ ?>
              </div>
            </div>
           </div>
           @endif

         </div>

         @endfor
         </div>









     <style media="screen">
    .carousel-control.left, .carousel-control.right {
     background-image: none;
     color:grey
    }
    .carousel-indicators{
      color:black
    }
    </style>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>

      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>

      </a>

    </div>

</div>





</section>
  <section id="contact">

    <div id="contact-us" class="parallax text-center">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua ut enim ad minim veniam</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <ul class="address">
              <li>
                <i class="fa fa-map-marker"></i>
                <span> Address:</span> 2400 South Avenue A </li>
              <li>
                <i class="fa fa-phone"></i>
                <span> Phone:</span> +928 336 2000 </li>
              <li>
                <i class="fa fa-envelope"></i>
                <span> Email:</span>
                <a href="mailto:someone@yoursite.com"> support@Lemonade.com</a>
              </li>
              <li>
                <i class="fa fa-globe"></i>
                <span> Website:</span>
                <a href="#">www.sitename.com</a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--/#contact-->
  <footer id="footer" style="background-color:#fcfcbc;">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms" style="background-color:#fcfcbc;">
      <div class="container text-center" style="background-color:#fcfcbc;">
        <div class="footer-logo" style="background-color:#fcfcbc;">
          <a href="index.html">
            <img class="img-responsive" src="{{asset('images/logo.png')}}" alt="">
          </a>
        </div>
        <div class="social-icons">
          <ul>
            <li>
              <a class="twitter" href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a class="instagram" href="#">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="facebook" href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy;
              <?php echo date('Y'); ?> Lemonade Band.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Designed by
              <a href="http://www.themeum.com/">Themeum</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
    $(document).ready(function () {
      $(".arrow-right").bind("click", function (event) {
        event.preventDefault();
        $(".vid-list-container").stop().animate({
          scrollLeft: "+=336"
        }, 750);
      });
      $(".arrow-left").bind("click", function (event) {
        event.preventDefault();
        $(".vid-list-container").stop().animate({
          scrollLeft: "-=336"
        }, 750);
      });
    });
  </script>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">


  <!-- date-range-picker -->
  <script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
  <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <!-- bootstrap datepicker -->
  <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- bootstrap color picker -->
  <script src="{{ asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="{{asset('js/jquery.inview.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/mousescroll.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.countTo.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />

</body>

</html>