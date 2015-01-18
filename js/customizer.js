/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	//Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// yearn-topbar-borders
	//wp.customize( 'yearn-topbar-borders', function( value ) {
	//	value.bind( function( to ) {
	//		if ( false === to ) {
	//			$( '#yearn-top-bar' ).css(
	//				'border-width','1px'
	//			);
	//		} else {
	//			$( '#yearn-top-bar' ).css(
	//				'border-width', '0px'
	//			);
	//		}
	//	});
	//});

	// yearn-stripe-borders
	wp.customize( 'yearn-topbar-borders', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#stripe' ).css(
					'border-width','1px'
				);
			} else {
				$( '#stripe' ).css(
					'border-width', '0px'
				);
			}
		});
	});

	// yearn_top_bar_foreground
	wp.customize( 'yearn_top_bar_foreground', function( value ) {
		value.bind( function( to ) {
			//if ( false === to ) {
            //
			//	$( '#top-bar' ).css(
			//		'color','inherit'
			//	);
            //
			//} else {

			$( '#yearn-top-bar' ).css(
				'color', to
			);

			//}
		});
	});

	wp.customize( 'yearn_color_one_background', function( value ) {
		value.bind( function( to ) {
			$( '.color-one,	#secondary .widget:nth-child(even)' ).css(
				'background-color', to
			);
		});
	});

	wp.customize( 'yearn_color_one_foreground', function( value ) {
		value.bind( function( to ) {
			$( '.color-one, .color-one a, a.color-one,  .widget a,	.widget-title, .widget_calendar caption, .site-description' ).css(
				'color', to
			);
		});
	});

	wp.customize( 'yearn_color_two_background', function( value ) {
		value.bind( function( to ) {
			$( '.color-two, .color-two a, .widget, .top-bar .widget_nav_menu ul ul, .hmenu ul ul, button, .button, input[type="button"], input[type="reset"], input[type="submit"]' ).css(
				'background-color', to
			);
		});
	});

	wp.customize( 'yearn_color_two_foreground', function( value ) {
		value.bind( function( to ) {
			$( '.color-two,	.widget, .top-bar .widget_nav_menu ul ul, .hmenu ul ul, button, .button, input[type="button"], input[type="reset"], input[type="submit"]' ).css(
				'color', to
			);
		});
	});

	wp.customize( 'yearn_content_background', function( value ) {
		value.bind( function( to ) {
			$( '#content .main').css(
				'background-color', to
			);
		});
	});

	wp.customize( 'yearn_background', function( value ) {
		value.bind( function( to ) {
			$( 'body').css( 'background-color', to );
		});
	});


} )( jQuery );