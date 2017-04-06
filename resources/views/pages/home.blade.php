@extends('backpack::app')

@section('content')

         <div id="primary">
            <!--INTRO SECTION-->
            <section id="banner-wrapper">
               <article id="intro">
                     <p>
                  Hi. This is is my first website built on the Laravel PHP framework. Right now, it is very much a work in progress which I will be adding to in the days and weeks to come. Using backpack base, I built out an admin panel then built out the front end.</p>

                  <p>Traditionally, I have built websites in Wordpress. I am still using Wordpress but trying to branch out into Laravel, and front-end technologies, starting with gaining a mastery of vanilla JS then progressing through the popular frameworks (React is likely the first). I'm also interested in Data Visualization and Data Analysis, and have been studying a bit of Python on the side.</p>

                  <p>Please be patient while I get this site in order!</p>

                     <button type="button" id="contact-me">Contact Me</button>
               </article><!--#intro-->

               <!--Contact Form: http://www.easylaravelbook.com/blog/2015/02/09/creating-a-contact-form-in-laravel-5-using-the-form-request-feature/
               https://laracasts.com/discuss/channels/laravel/simple-contact-form-for-laravel-53
               -->
               <form id="contact-me" method="POST" action="#">
                   <input type="text" name="name" value="name">
                   <input type="email" name="email" value="email">
                   <input type="textarea" name="message" value="message">
               </form>

                <section id="slider">
                    <div class="flexslider carousel">
                    <ul class="slides">
                        <li>
                            <img src="images/opera-slider.jpg" />
                            </li>
                            <li>
                            <img src="images/Unbearables_2.jpg" />
                            </li>
                            <li>
                            <img src="images/Writing.jpg" />
                            </li>
                    </ul>
                    </div>
                </section>

            </section><!--#banner-wrapper-->

            <section id="portfolio">
               <header id="section-header">
                  <h1>Portfolio</h1>
               </header><!--#section-header-->
            
               
                <div id="projects">
                    <section id="button-list">
                        <button id="personal">Personal</button>
                        <button id="corporate">Corporate</button>
                        <button id="agency">Agency</button>
                        <button id="private-client">Private Client</button>
                        <button id="all">All</button>
                    </section>
                    <ul>
                @if($works)
                    @foreach($works as $work)
                        <li class="view view-fifth {{ $work->work_category->name }}">
                            <figure>
                                <a href="{{route('works.work', $work->slug)}}"><img height="150px" src="{{ $work->thumbnail? $work->thumbnail->file : 'http://placehold.it/50*50'}}" alt=""></a>
                            <figcaption class="mask">
                                <!--<h2>Carnegie Great Immigrants</h2>
                                
                                
                                <a href="#" class="info">Read More</a>-->
                            </figcaption>
                            </figure>
                        
                        </li>
                        @endforeach
                    @endif 
                    </ul>          
                    </div>

            </section>

         </div><!--#primary-->


@stop

