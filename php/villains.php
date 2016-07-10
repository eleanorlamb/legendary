<?php
// Load the DB Connection
include_once( 'common.php' );

if( isset( $_POST[ 'operation' ] ) ) {
	switch( $_POST[ 'operation' ] ) {
		/*
			Find us a mastermind
		*/
		case 'mastermind':
			// Turn expansions into a string
			$expansions = stringify( $_POST[ 'expansions' ] );

			// Form our SQL statement
			$sql = 'select * from masterminds where expansion in (' . $expansions . ') order by name';

			// Run our query
			$result = runQuery( $sql );

			// Make an array to hold the schemes
			$masterminds = [];

			// Smash the schemes onto an array
			while ( $mastermind = $result->fetch_assoc() ) {
				$masterminds[] = $mastermind;		
			}

			// Pick a random scheme
			$mastermind = $masterminds[ mt_rand( 0, count( $masterminds) - 1 ) ];

			$json = array(
				'html' => '<div class="large-12 columns"><h3 class="mastermind">' . $mastermind[ 'name' ] . '</h3></div>',
				'leads' => ( $mastermind[ 'leads' ] > 0 ? ( int ) $mastermind['leads'] : 0 ),
				);

			echo json_encode( $json );			
			break;


		/*
			Find us villains!
		*/
		case 'villains':
			// Turn expansions into a string
			$expansions = stringify( $_POST[ 'expansions' ] );

			// Get the number of players	
			$players = $_POST[ 'players' ];

			// Figure out how many villain groups to add
			$villainCount = $setup[ $players ][ 'villains' ] + ( isset( $_POST[ 'schemeVillains'] ) ? $_POST[ 'schemeVillains'] : 0 );

			// Hold our villains
			$villains = [];

			// Hold the IDs of villains we have picked
			$ids = '';

			// Do we have a mastermind group to add as a villain? All villains have IDs over 100
			if( $_POST[ 'mastermind'] >= 100 ) {
				$ids .= $_POST[ 'mastermind'];
			}

			// Does this scheme have a required villain group?
			if( $_POST[ 'schemeReq'] >= 100 ) {
				if( $ids != '' ) {
					$ids .= ',';
				}

				$ids .= $_POST[ 'schemeReq' ];
			}

			if( $ids != '' ) {
				// Load our required villain(s)
				$villains = villainQuery( 'villains', $expansions, $villainCount, $ids );

				// Adjust the number of villains needed
				$villainCount -= count( $villains );
			}

			// Now load the rest
			$villains = array_merge( $villains, villainQuery( 'villains', $expansions, $villainCount, null, $ids ) );

			// Set up a blank HTML string
			$html = '';

			foreach( $villains as $villain ) {
				$html .= '<div class="large-12 columns villain">';
				$html .= '	<span class="name">' . $villain[ 'name' ] . '</span>';
				$html .= '</div>';
			}

			$json = array(
				'html' => $html,
				);

			echo json_encode( $json );
			break;

		/*
				Find our henchmen
		*/
		case 'henchmen':
			// Turn expansions into a string
			$expansions = stringify( $_POST[ 'expansions' ] );

			// Get the number of players	
			$players = $_POST[ 'players' ];

			// Figure out how many villain groups to add
			$henchmenCount = $setup[ $players ][ 'henchmen' ] + ( isset( $_POST[ 'henchmen'] ) ? $_POST[ 'henchmen'] : 0 );

			// Hold our villains
			$henchmen = [];

			// Hold the IDs of villains we have picked
			$ids = '';

			// Do we have a mastermind group to add as a villain? All villains have IDs over 100
			if( $_POST[ 'mastermind'] < 100 ) {
				$ids .= $_POST[ 'mastermind'];
			}

			// Does this scheme have a required villain group?
			if( $_POST[ 'schemeReq'] < 100 ) {
				if( $ids != '' ) {
					$ids .= ',';
				}

				$ids .= $_POST[ 'schemeReq' ];
			}

			if( $ids != '' ) {
				// Load our required villain(s)
				$henchmen = villainQuery( 'villains', $expansions, $henchmenCount, $ids );

				// Adjust the number of villains needed
				$henchmenCount -= count( $henchmen );
			}

			// Now load the rest
			$henchmen = array_merge( $henchmen, villainQuery( 'henchmen', $expansions, $henchmenCount, null, $ids ) );

			// Set up a blank HTML string
			$html = '';

			foreach( $henchmen as $group ) {
				$html .= '<div class="large-12 columns villain">';
				$html .= '	<span class="name">' . $group[ 'name' ] . '</span>';
				$html .= '</div>';
			}

			$json = array(
				'html' => $html,
				);

			echo json_encode( $json );
			break;
	}
}


/*
*/
function villainQuery( $type, $expansions, $count, $ids = null, $taken = null ) {
	// Assume villain was the request
	$table = 'villains';

	// Change stuff if we want a henchman instead
	if( $type == 'henchmen' ) {
			$table = 'henchmen';
	}

	// Set up an empty where array
	$where = [];

	if( $ids != '' && $ids != null ) {
			$where[] = 'id in (' . $ids . ')';
	}

	if( $taken != '' && $taken != null ) {
		$where[] = 'id not in (' . $taken . ')';
	}

	// Set up our query
	$sql = 'select * from ' . $table . ' where expansion in (' . $expansions . ')';


	// Add any where clauses
	for( $i = 0; $i < count( $where ); $i++ ) {
		$sql .= ' and ' . $where[ $i ];
	}

	// Execute the query
	$result = runQuery( $sql );

	// Get all of the results
	$villains = $result->fetch_all( MYSQLI_ASSOC );

	$result->free();

	// Array to hold what gets selected
	$selected = [];

	// Fill up our selected array with villains
	for( $i = $count; $i > 0; $i-- ) {
		if( count( $villains ) >= 1 ) {
			$id = mt_rand( 0, count( $villains ) - 1 );

			$selected[] = $villains[ $id ];
		
			// Remove this villain from the array
			array_splice( $villains, $id, 1 );				
		} else {
			$selected = array_merge( $selected, $villains );
			break;
		}
	}

	// Return our villain(s)
	return $selected;
}