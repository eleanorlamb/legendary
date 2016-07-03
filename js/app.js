$(document).foundation();

/*
$.post( '/php/legendary.php', function( data ) {
	$( 'body' ).append( data );
});
*/

$( '.hero' ).click( function() {
	var state = $( '.fancy-checkbox', this ).data( 'fancy-checkbox' );

	// Change from no selection to require
	if( state == 0 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', 1 ).addClass( 'require' );

		$( 'input[name="require"]', this ).prop( 'checked', true );
		$( 'input[name="ban"]', this ).prop( 'checked', false );
	}

	// Change from require to ban
	if( state == 1 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', -1 ).removeClass( 'require' ).addClass( 'ban' );

		$( 'input[name="require"]', this ).prop( 'checked', false );
		$( 'input[name="ban"]', this ).prop( 'checked', true );
	}

	// Change from ban to no selection
	if( state == -1 ) {
		$( '.fancy-checkbox', this ).data( 'fancy-checkbox', 0 ).removeClass( 'ban' );

		$( 'input[name="require"]', this ).prop( 'checked', false );
		$( 'input[name="ban"]', this ).prop( 'checked', false );
	}
});
