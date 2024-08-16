/**
 * File app.js
 * 
 * Theme Javascript enhancements for a better user experience.
 * Wrote in Jquery 
 */

jQuery(document).ready(function($){ 

    // ___________________ Site Loader ______________________

    $('.site-loader').addClass('hide')
    setTimeout(function() { 
        $('.site-loader').hide()
    }, 1000);


})