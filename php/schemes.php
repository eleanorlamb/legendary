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
				
			$html = '<div class="large-12 columns">';
			$html .= 	'<h3>' . $scheme[ 'name' ] . '</h3>';
		
			if( strlen( $scheme[ 'setup' ] ) > 0 ) {
//				$html .=	'<h6>Setup</h6>';
				$html .=	'<div class="scheme-text"><h6>Setup:</h6>' . $scheme[ 'setup' ] . '</div>';
			}

			if( strlen( $scheme[ 'twist' ] ) > 0 ) {
//				$html .=	'<h6>Twist</h6>';
				$html .=	'<div class="scheme-text"><h6>Twist:</h6>' . $scheme[ 'twist' ] . '</div>';	
			}

			if( strlen( $scheme[ 'special_rules' ] ) > 0 ) {
//				$html .=	'<h6>Special Rules</h6>';
				$html .=	'<div class="scheme-text"><h6>Special Rules:</h6>' . $scheme[ 'special_rules' ] . '</div>';
			}

			$html .= '</div>';

			$json = array(
				'heroes' 				=> ( $scheme[ 'heroes' ] > 0 ? ( int ) $scheme['heroes'] : 0 ),
				'villains' 				=> ( $scheme[ 'villains' ] > 0 ? ( int ) $scheme['villains'] : 0 ),
				'required_villains' 	=> ( $scheme[ 'required_villain' ] > 0 ? ( int ) $scheme['required_villain'] : 0 ),
				'henchment' 			=> ( $scheme[ 'henchmen' ] > 0 ? ( int ) $scheme['henchmen'] : 0 ),
				'scheme'				=> ( int ) $scheme[ 'id'],
				'html'					=> ( $html ),
				);

			echo json_encode( $json );
			break;
	}
}