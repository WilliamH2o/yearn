/**
 * Superfish Settings
 */
jQuery(document).ready(function($) {
    var sf = $( 'ul.menu' );
    sf.superfish( {
        delay:		500,
        animation:   {opacity:'show',height:'show'},
        speed:		'fast'
    });
});