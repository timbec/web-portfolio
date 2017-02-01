<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tim Beckett Web Portfolio</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ ('css/app.css') }}">


</head>
<body>


    <div id="page" class="container site">
      <header id="masthead" class="site-header" role="header">
         <div class="black-rectangle"></div>
            <div class="blue-circle">
              <svg width="140" height="140"></svg>
            </div>

            <!--Main design-->
            <div class="logo">
            <div class="red-triangle"></div>
            <div class="black-cube"></div>
            <div class="red-cube"></div>
            </div><!--end.logo-->
           <div class="titles">
             <h1 id="site-title"><a href="/" rel="home">Tim Beckett</a></h1>
             <h4 class="subheader">Web Portfolio</h4>
          </div><!--.titles-->

    <!--++++++++END LOGO+++++++++++-->

          <nav id="site-navigation" class="main-navigation" role="navigation">
               <ul>
                  <li>
                     <a href="">About</a>
                     <a href="#portfolio">Portfolio</a>
                     <a href="">CV</a>
                     <a href="">Contact</a>
                     <a href="">Blog</a>
                  </li>
               </ul>
          </nav>

          <ul id="caption">
             <li>Quality,</li>
             <li>Creativity,</li>
             <li>Conviviality</li>
          </ul>
           <!--end caption-->
      </header>


       <div class="content">
       @yield('content')
        </div>
      </div><!--#page-->
   <footer>
      <p class="copyright">&copy;Tim Beckett <span class="date">2016</span></p>
   </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="js/app.js"></script>
</body>
</html>
