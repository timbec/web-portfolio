
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./flexslider.min.js'); 
require('./menu.js'); 
require('./magnific-popup'); 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: 'body'
// });


$(document).ready(function($) {

    $('.flexslider').flexslider({
        animation: "slide" 
    }); 

    $(".comment-reply-container .toggle-reply").click(function(){
          console.log(this); 
          $(this).next().slideToggle("slow");
      });

      // $('.work-content').magnificPopup({
      //   delegate: 'a',
      //   type: 'image',
      //   tLoading: 'Loading image #%curr%...',
      //   mainClass: 'mfp-img-mobile',
      //   gallery: {
      //     enabled: true,
      //     navigateByImgClick: true,
      //     preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      //   },
      //   image: {
      //     tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      //     titleSrc: function(item) {
      //       return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      //     }
      //   }
      // });

    $('button').on('click', function() {
      $(this).parents('#projects').find('li').removeClass('show');
      $(this).parents('#projects').find('li').addClass('hide');
   });

   $('#personal').on('click', function() {
      $('li.Personal').removeClass('hide');
      $('li.Personal').addClass('show');
   });
   $('#corporate').on('click', function() {
      $('li.Corporate').removeClass('hide');
      $('li.Corporate').addClass('show');
   });
   $('#agency').on('click', function() {
      $('li.Agency').removeClass('hide');
      $('li.Agency').addClass('show');
   });
   $('#private-client').on('click', function() {
      $('li.Private-Client').removeClass('hide');
      $('li.Private-Client').addClass('show');
   });
   $('#all').on('click', function() {
      $('li').removeClass('hide');
      $('li').addClass('show');
   });
}); 

  /**
   * Push left instantiation and action.
   */
  var pushLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushLeftBtn = document.querySelector('#c-button--push-left');
  
  pushLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushLeft.open();
  });

  /**
   * JS Lightbox, adapated from Javascript for WP
   * 
   */
  /********************************
 * Simple Lightbox
 * 1.4.1.8
 *
 *******************************/

var body = document.querySelector( 'body' ),
    lightboxDemo = document.querySelector( '.work-content' ),
    lightboxLinks = document.querySelectorAll( '.work-content p img' ),
    lightboxImages = document.querySelectorAll('img'),
    imagesLinks = lightboxLinks,
    overlay = document.createElement( 'div' ),
    overlayCloseLink = document.createElement( 'a' ),
    overlayCloseText = document.createTextNode( 'X' ),
    displayOverlay,
    openLightbox,
    closeLightBox,
    addImageToOverlay;

console.log(imagesLinks);

closeLightBox = function closeLightBox( e ) {

  e.preventDefault();
  overlayCloseLink.removeEventListener( 'click', closeLightBox, false );
  overlay.querySelector( 'img' ).remove();
  overlay.remove();

};

displayOverlay = function displayOverlay() {

  overlay.setAttribute( 'id', 'overlay'  );
  overlayCloseLink.appendChild( overlayCloseText );
  overlayCloseLink.setAttribute( 'href', '#' );
  overlayCloseLink.classList.add( 'close' );
  overlayCloseLink.addEventListener( 'click', closeLightBox, false );

  overlay.appendChild( overlayCloseLink );
  body.appendChild( overlay );
  //console.log( 'here' );

};

addImageToOverlay = function addImageToOverlay( img ) {

  overlay.appendChild( img )

}

openLightbox = function openLightbox( e ) {
  e.preventDefault();
  console.log(e.target.cloneNode());
  displayOverlay();
  addImageToOverlay( e.target.cloneNode() );
};

//to make every image clickable in a gallery
for (var i=0; i< imagesLinks.length; i++) {
      imagesLinks[i].addEventListener( 'click', openLightbox );
      //overlay.appendChild(lightboxImages[i]);
      console.log(lightboxImages[i]); 
      lightboxImages[i].classList.add('is-visible');
}

lightboxDemo.style.display = 'block';
