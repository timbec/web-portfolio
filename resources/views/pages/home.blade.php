@extends('backpack::app')

@section('content')

         <div id="primary">
            <!--INTRO SECTION-->
            <section id="banner-wrapper">
               <article id="intro">
                     <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quidem magni, placeat dolores deserunt voluptatem nobis iusto aliquam assumenda. Molestias quidem et qui explicabo natus necessitatibus repellat, nihil magnam consequuntur!
                     </p>

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
                        <button id="wordpress">Wordpress</button>
                        <button id="laravel">Laravel</button>
                        <button id="front-end">Front End</button>
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

