<?php
// Load the DB Connection
include_once( 'common.php' );

if( isset( $_POST[ 'operation' ] ) ) {
	switch( $_POST[ 'operation' ] ) {
		/*
			Get the information we need to make a new game
		*/
		case 'new':
			// Turn expansions into a string
			$expansions = stringify( $_POST[ 'expansions' ] );

			// Form our SQL statement
			$sql = 'select * from schemes where expansion in (' . $expansions . ') order by name';

			// Run our query
			$result = runQuery( $sql );

			// Make an array to hold the schemes
			$schemes = [];

			// Smash the schemes onto an array
			while ( $scheme = $result->fetch_assoc() ) {
				$schemes[] = $scheme;		
			}

			// Pick a random scheme
			$scheme = $schemes[ mt_rand( 0, count( $schemes) - 1 ) ];

			$json = array(
				'heroes' 				=> ( $scheme[ 'heroes' ] > 0 ? ( int ) $scheme['heroes'] : 0 ),
				'villains' 				=> ( $scheme[ 'villains' ] > 0 ? ( int ) $scheme['villains'] : 0 ),
				'required_villains' 	=> ( $scheme[ 'required_villain' ] > 0 ? ( int ) $scheme['required_villain'] : 0 ),
				'henchment' 			=> ( $scheme[ 'henchmen' ] > 0 ? ( int ) $scheme['henchmen'] : 0 ),
				'scheme'				=> ( int ) $scheme[ 'id'],
				);

			echo json_encode( $json );
			break;
	}
}