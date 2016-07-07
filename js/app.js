// Load foundation
$(document).foundation();

// Load the initial set up
initialLoad();


/*
	Expansion Functions
*/
$( '.expansion' ).click( function() {
	// Create / Update the expansion cookie
	createCookie( 'expansion' );
});


/*
	Hero Functions
*/
$( 'body' ).on( 'click', '.hero', function() {
	var state = $( '.fancy-checkbox', this ).data( 'fancy-checkbox' );

	// Change from no selection to require
	if( state == 0 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', 1 ).addClass( 'require' );

		$( 'input[name="hero-require"]', this ).prop( 'checked', true );
		$( 'input[name="hero-ban"]', this ).prop( 'checked', false );
	}

	// Change from require to ban
	if( state == 1 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', -1 ).removeClass( 'require' ).addClass( 'ban' );

		$( 'input[name="hero-require"]', this ).prop( 'checked', false );
		$( 'input[name="hero-ban"]', this ).prop( 'checked', true );
	}

	// Change from ban to no selection
	if( state == -1 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', 0 ).removeClass( 'ban' );

		$( 'input[name="hero-require"]', this ).prop( 'checked', false );
		$( 'input[name="hero-ban"]', this ).prop( 'checked', false );
	}

	// Create / Update our ban and require cookies
	createCookie( 'hero-require', 'hero' );
	createCookie( 'hero-ban', 'hero' );
});


/*
	Reset all heroes back to no selection
*/
$( '#hero-reset' ).click( function() {
	$( '.hero' ).each( function() {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', 0 ).removeClass( 'ban' ).removeClass( 'require' );

		$( 'input[name="require"]', this ).prop( 'checked', false );
		$( 'input[name="ban"]', this ).prop( 'checked', false );		
	});

	// Delete the require & ban cookies
	Cookies.remove( 'hero-require' );
	Cookies.remove( 'hero-ban' );
});


/*
	Filter things based on expansions selected
*/
$( '#filter-content' ).click( function() {
	// Start a blank string
	var expansions = {};

	// Loop through all of our checked expansions
	$( '.expansion' ).each( function( index, element ) {
		if( $( 'input[type="checkbox"]', this ).is( ':checked' ) ) {
			expansions[ index ] = $( this ).data( 'expansion' );
		}
	});

	// Load our heroes
	$.post( 'php/heroes.php', { operation: 'filter', expansions: expansions }, function( result ) {
		// Reset any of our heroes just to be safe
		$( '#hero-reset' ).click();

		$( '#heroes' ).fadeOut( 300, function() {
			$( '#heroes' ).html( result ).fadeIn( 300 );
		});
	});
});


$( '#randomize-button' ).click( function() {
	$( this ).addClass( 'disabled' ).prop( 'disabled', true );

	// Set the default to just having the base game
	var expansions = { 1: '1' };

	// Is there an expansion cookie set?
	if( Cookies.get( 'expansions' ) != undefined ) {
		expansions = Cookies.getJSON( 'expansion' );	
	}

	var heroesRequire = Cookies.getJSON( 'hero-require' );
	var heroesBan = Cookies.getJSON( 'hero-ban' );

	$.post( 'php/heroes.php', { operation: 'generate', players: $( '#player-select' ).val(), expansions: expansions, heroRequire: heroesRequire, heroBan: heroesBan }, function( result ) {
		$( '#heroes-result' ).html( result );
		console.log( result );

		$( '#randomize-button' ).removeClass( 'disabled' ).prop( 'disabled', false );
	});
});


/*
	Load our content on page load based on what expansions are selected
*/
function initialLoad() {
	console.log( 'Initial Cookies' );
	console.log( '---------------' );
	console.log( Cookies.get() );
	console.log( '---------------' );

	// Set the default to just having the base game
	var expansions = { 1: '1' };

	// Is there an expansion cookie set?
	if( Cookies.get( 'expansion' ) != undefined ) {
		expansions = Cookies.getJSON( 'expansion' );	
	}

	// Loop through our expansions and set the checkboxes to checked
	$.each( expansions, function( key, value ) {
		$( '#expansion-' + value + ' input[type="checkbox"]' ).prop( 'checked', true );
	});

	// Load our heroes
	$.post( 'php/heroes.php', { operation: 'filter', expansions: expansions }, function( result ) {
		// Set the heroes div to be the html we got from our script
		$( '#heroes' ).html( result );

		// Try to load our required heroes and our banned heroes
		var heroesRequire = Cookies.getJSON( 'hero-require' );
		var heroesBan = Cookies.getJSON( 'hero-ban' );

		// Loop through each of our required heroes
		$.each( heroesRequire, function( key, value ) {
			$( '#hero-' + value + ' input[name="hero-require"]' ).prop( 'checked', true );
			$( '#hero-' + value + ' .fancy-checkbox' ).data( 'fancy-checkbox', 1 ).addClass( 'require' );
		});

		// Loop through each of our banned heroes
		$.each( heroesBan, function( key, value ) {
			$( '#hero-' + value + ' input[name="hero-ban"]' ).prop( 'checked', true );
			$( '#hero-' + value + ' .fancy-checkbox' ).data( 'fancy-checkbox', -1 ).addClass( 'ban' );
		});
	});	
}


/*
	Creates a cookie of stuff
*/
function createCookie( type, parent ) {
	var temp = [];
	var selector = '.' + type;
	var dataName = type;

	if( parent != null ) {
		selector = '.' + parent;
		dataName = parent;
	}

	$( selector ).each( function() {
		if( $( 'input[name="' + type + '"]', this ).is( ':checked' ) ) {
			temp.push( $( this ).data( dataName ) );
		}
	});

	// Turn our expansions into an object
	temp = $.extend( {}, temp );

	// Store our expansions in a cookie
	Cookies.set( type, temp );
}