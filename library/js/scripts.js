/*
 * Bones Scripts File
 * Author: Florian Egermann
 *
*/


jQuery(document).ready(function($) {

  // add lightbox to wordpress galleries
  // see: http://dimsemenov.com/plugins/magnific-popup/documentation.html

  $('.gallery-icon').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery:{enabled:true}
  });


}); /* end of as page load scripts */
