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
			$villainCount = $setup[ $players ][ 'villains' ] + ( $_POST[ 'schemeVillains'] > 0 ? $_POST[ 'schemeVillains'] : 0 );

			// Hold our villains
			$villains = [];

			// Hold the IDs of villains we have picked
			$ids = '';

			// Do we have a mastermind group to add as a villain? All villains have IDs over 100
			if( $_POST[ 'mastermind'] >= 100 ) {
				$sql = 'select * from villains where expansion in (' . $expansions . ') and id = ' . $_POST[ 'mastermind' ] . ' order by name';

				// Run our query
				$result = runQuery( $sql );

				// Smash the villain onto the array
				while ( $villain = $result->fetch_assoc() ) {
					$villains[] = $villain;		
					$ids .= $villain[ 'id' ] .',';
				}
			}

			// Does this scheme have a required villain group?
			if( $_POST[ 'mastermind'] >= 100 ) {
				$sql = 'select * from villains where expansion in (' . $expansions . ') and id = ' . $_POST[ 'schemeVillains' ];

				if( count( $villains ) > 0 ) {
					$sql .= ' and id not in (' . rtrim( $ids, ',' ) . ')';
				}

				$sql .= ' order by name';

				// Run our query
				$result = runQuery( $sql );

				// Smash the villain onto the array
				while ( $villain = $result->fetch_assoc() ) {
					$villains[] = $villain;
					$ids .= $villain[ 'id' ] . ',';
				}
			}

			// Get the rest of our villains
			for( $i = count( $villains); $i <= $villainCount; $i++ ) {
				$sql = 'select * from villains where expansion in (' . $expansions . ')';

				if( count( $villains ) > 0 ) {
					$sql .= ' and id not in (' . rtrim( $ids, ',' ) . ')';
				}

				$sql .= ' order by name';

				// Run our query
				$result = runQuery( $sql );

				// Temporary Array
				$temp = [];

				// Smash the villain onto the array
				while ( $villain = $result->fetch_assoc() ) {
					$temp[] = $villain;
				}

				$id = mt_rand( 0, count( $temp) - 1 );

				$villains[] = $temp[ $id ];

				$ids .= $temp[ $id ][ 'id' ] . ',';
			}

			// Set up a blank HTML string
			$html = '';


			foreach( $villains as $villain ) {
//			echo '<pre>'; print_r($villain); echo '</pre>';
				$html .= '<div class="large-12 columns villain">';
				$html .= '	<span class="name">' . $villain[ 'name' ] . '</span>';
				$html .= '</div>';
			}

			$json = array(
				'html' => $html,
				);

			echo json_encode( $json );
			break;
	}
}