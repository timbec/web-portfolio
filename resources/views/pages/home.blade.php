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

               <section id="projects">
                  <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/greatimmigrants.jpg" />
                    <div class="mask">
                        <h2>Carnegie Great Immigrants</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>
                <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/Unbearables_tn.jpg" />
                    <div class="mask">
                        <h2>The Unbearables</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>
                <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/sensitive_skin_tn.jpg" />
                    <div class="mask">
                        <h2>Hover Style #5</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>
                <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/opera_tn.jpg" />
                    <div class="mask">
                        <h2>Hover Style #5</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>
                 <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/carnegie.jpg" />
                    <div class="mask">
                        <h2>Hover Style #5</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>
                 <div class="view view-fifth">
                    <img src="/static/thumbnail/optimum/bedsuystreetmurals_tn.png" />
                    <div class="mask">
                        <h2>Hover Style #5</h2>
                        
                        <a href="#" class="info live-site">Live Site</a>
                        <a href="#" class="info">Read More</a>
                    </div>
                </div>

            </section>

         </div><!--#primary-->


@stop

