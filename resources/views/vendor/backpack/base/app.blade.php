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

    <link rel="stylesheet" href="{{ ('/css/app.css') }}">


</head>
<body>
     <!--http://callmenick.com/post/slide-and-push-menus-with-css3-transitions-->
      <nav id="c-menu--push-left" class="c-menu c-menu--slide-left">
    <button class="c-menu__close">&larr; Close Menu</button>
      <ul class="c-menu__items">
          <li>
              <a href="/about">About</a>
              <a href="/#portfolio">Portfolio</a>
              <a href="/cv">CV</a>
              <a href="/contact">Contact</a>
              <a href="/blog">Blog</a>
          </li>
        </ul>
  </nav>


    <div id="o-wrapper" class="o-wrapper container site">
      <header id="masthead" class="site-header" role="header">
      <button id="c-button--push-left" class="c-button">☰</button>
         <div class="black-rectangle"></div>
         <div class="main-logo-title">
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
         </div>

    <!--++++++++END LOGO+++++++++++-->

          <ul id="caption">
             <li>Quality,</li>
             <li>Creativity,</li>
             <li>Conviviality</li>
          </ul>
           <!--end caption-->

              <!-- Secondary Navigation, to display on desktop -->


    <nav id="site-navigation" class="main-navigation" role="navigation">
      <div class="collapse navbar-collapse"><ul id="menu-primary" class="nav navbar-nav"><li id="menu-item-680" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-680"><a title="About" href="/about">About</a></li>
        <li id="menu-item-679" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-679"><a title="Portfolio" href="#portfolio">Portfolio</a></li>
        <li id="menu-item-433" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-433"><a title="CV" href="/cv">CV</a></li>
        <li id="menu-item-413" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-413"><a title="Contact" href="/contact">Contact</a></li>
        <li id="menu-item-573" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-573"><a title="blog" href="/blog">blog</a></li>
        </ul></div>            
      </nav>
    <!-- End Navigation -->
      </header>


       <div id="content" class="site-content">
       @yield('content')
        </div>
      </div><!--#page-->

      <div id="c-mask" class="c-mask"></div><!-- /c-mask -->

   <footer>
      <p class="copyright">&copy;Tim Beckett <span class="date">2016</span></p>
   </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="/js/app.js"></script>
</body>
</html>
