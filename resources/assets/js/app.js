
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./flexslider.min.js'); 
require('./menu.js'); 

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
}); 

console.log('working');

  /**
   * Push left instantiation and action.
   */
  var pushLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  console.log(pushLeft); 

  var pushLeftBtn = document.querySelector('#c-button--push-left');
  
  pushLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushLeft.open();
  });