

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Roxandrea @yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('roxandrea/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('roxandrea/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('roxandrea/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('roxandrea/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('roxandrea/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('roxandrea/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('roxandrea/css/style.css')}}">
    @yield("css")
  </head>
  <body>

  @include("site.nav");

    @yield("content")
		
    @include("site.footer");
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('roxandrea/js/jquery.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/popper.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/aos.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/jquery.mb.YTPlayer.min.js')}}"></script>
  <script src="{{asset('roxandrea/js/bootstrap-datepicker.js')}}"></script>
  <!-- // <script src="{{asset('roxandrea/js/jquery.timepicker.min.js')}}"></script> -->
  <script src="{{asset('roxandrea/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('roxandrea/js/google-map.js')}}"></script>
  <script src="{{asset('roxandrea/js/main.js')}}"></script>
  @yield("js") 
  </body>
</html>