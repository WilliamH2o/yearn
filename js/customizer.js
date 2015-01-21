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

	// Colors

	// Site

	// yearn-colors-site-background
	wp.customize( 'yearn-colors-site-background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'body' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( 'body' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-site-text
	wp.customize( 'yearn-colors-site-text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'body' ).css(
					'color', 'inherit'
				);
			} else {
				$( 'body' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-site-links
	wp.customize( 'yearn-colors-site-links', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'a' ).css(
					'color', 'inherit'
				);
			} else {
				$( 'a' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-site-content_background
	wp.customize( 'yearn-colors-site-content_background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#primary' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( '#primary' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-site-content_background
	wp.customize( 'yearn-colors-site-sidebar_background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#secondary' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( '#secondary' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-content-title_background
	wp.customize( 'yearn-colors-content-title_background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'h1.entry-title, .page-title, .entry-meta' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( 'h1.entry-title, .page-title, .entry-meta' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-content-title_text
	wp.customize( 'yearn-colors-content-title_text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'h1.entry-title, .page-title, .entry-meta' ).css(
					'color', 'inherit'
				);
			} else {
				$( 'h1.entry-title, .page-title, .entry-meta' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-archives-title_background
	wp.customize( 'yearn-colors-archives-title_background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'h3.entry-title' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( 'h3.entry-title' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-archives-title_text
	wp.customize( 'yearn-colors-archives-title_text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'h3.entry-title, h3.entry-title a' ).css(
					'color', 'inherit'
				);
			} else {
				$( 'h3.entry-title, h3.entry-title a' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-archives-title_background
	wp.customize( 'yearn-colors-archives-content_background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.entry-excerpt' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( '.entry-excerpt' ).css(
					'background-color', to
				);
			}
		});
	});

	// Top Bar

	// yearn-colors-topbar-background
	wp.customize( 'yearn-colors-topbar-background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-top-bar' ).css(
					'background', 'inherit'
				);
			} else {
				$( '#yearn-top-bar' ).css(
					'background', to
				);
			}
		});
	});

	// yearn-colors-topbar-text
	wp.customize( 'yearn-colors-topbar-text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-top-bar' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-top-bar' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-topbar-links
	wp.customize( 'yearn-colors-topbar-links', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-top-bar a' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-top-bar a' ).css(
					'color', to
				);
			}
		});
	});

	// Content

	// yearn-colors-content-buttons-background
	wp.customize( 'yearn-colors-content-button-background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.edit-link a, .nav-links a, button,	.button, input[type="button"], input[type="reset"],	input[type="submit"]' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( '.edit-link a, .nav-links a, button,	.button, input[type="button"], input[type="reset"],	input[type="submit"]' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-content-buttons-text
	wp.customize( 'yearn-colors-content-button-text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.edit-link a, .nav-links a, button,	.button, input[type="button"], input[type="reset"],	input[type="submit"]' ).css(
					'color', 'inherit'
				);
			} else {
				$( '.edit-link a, .nav-links a, button,	.button, input[type="button"], input[type="reset"],	input[type="submit"]' ).css(
					'color', to
				);
			}
		});
	});

	// footer

	// yearn-colors-footer-background
	wp.customize( 'yearn-colors-footer-background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-site-footer' ).css(
					'background', 'inherit'
				);
			} else {
				$( '#yearn-site-footer' ).css(
					'background', to
				);
			}
		});
	});

	// yearn-colors-footer-text
	wp.customize( 'yearn-colors-footer-text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-site-footer' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-site-footer' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-footer-links
	wp.customize( 'yearn-colors-footer-links', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-site-footer a' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-site-footer a' ).css(
					'color', to
				);
			}
		});
	});

	// bottombar

	// yearn-colors-bottombar-background
	wp.customize( 'yearn-colors-bottombar-background', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-bottom-bar' ).css(
					'background-color', 'inherit'
				);
			} else {
				$( '#yearn-bottom-bar' ).css(
					'background-color', to
				);
			}
		});
	});

	// yearn-colors-bottombar-text
	wp.customize( 'yearn-colors-bottombar-text', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-bottom-bar' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-bottom-bar' ).css(
					'color', to
				);
			}
		});
	});

	// yearn-colors-bottombar-links
	wp.customize( 'yearn-colors-bottombar-links', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '#yearn-bottom-bar a' ).css(
					'color', 'inherit'
				);
			} else {
				$( '#yearn-bottom-bar a' ).css(
					'color', to
				);
			}
		});
	});


	//wp.customize( 'yearn-colors-topbar-background', function( value ) {
	//	value.bind( function( to ) {
	//		$( '#yearn-top-bar' ).css(
	//			'background-color', to
	//		);
	//	});
	//});

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