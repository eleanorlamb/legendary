<?php
// Load the DB Connection
include_once( 'common.php' );

if( isset( $_POST[ 'operation' ] ) ) {
	switch( $_POST[ 'operation' ] ) {
		case 'filter':
			// Turn expansions into a string
			$expansions = stringify( $_POST[ 'expansions' ] );

			// Form our SQL statement
			$sql = 'select id, name, team from heroes where expansion in (' . $expansions . ') order by name';

			// Run our query
			$result = runQuery( $sql );

			// Draw our heroes
			drawHeroes( $result );
			break;

		/*
			User clicked the randomize button
		*/
		case 'generate':
			// Turn results into strings
			$expansions = stringify( $_POST[ 'expansions' ] );

			if( isset( $_POST[ 'heroRequire' ] ) ) {
				$require = stringify( $_POST[ 'heroRequire' ] );
			} else {
				$require = null;
			}

			if( isset( $_POST[ 'heroBan' ] ) ) {
				$ban = stringify( $_POST[ 'heroBan' ] );
			} else {
				$ban = null;
			}

			// Get the number of players	
			$players = $_POST[ 'players' ];

			// Get our eligable heroes
			$team[] = heroQuery( $expansions, $require, $ban );

			$ids = $team[ 0 ][ 'id' ] . ',';

			// Fill up the rest of our heroes
			for( $i = 1; $i < $setup[ $players][ 'heroes']; $i++ ) {
				// Use up all of the required heroes first
				if( isset( $_POST[ 'heroRequire' ] ) && $i < count( $_POST[ 'heroRequire' ] ) ) {
					$team[] = heroQuery( $expansions, $require, $ban, rtrim( $ids, ',' ) );
				} else {
					$team[] = heroQuery( $expansions, null, $ban, rtrim( $ids, ',' ) );
				}

				// Add this hero's ID to the list of already chose ones
				$ids .= $team[ $i ][ 'id' ] . ',';
			}

			// Draw the team
			drawHeroesResult( $team );

			break;

		/*
			Should never get here!
		*/
		default:
			break;
	}
} 


function heroQuery( $expansions, $require = null, $ban = null, $idExclude = null, $teamExclude = null ) {
	$heroes = [];
	$where = [];

	if( $require != null ) {
		$where[] = 'id in (' . $require . ')';
	}

	if( $ban != null ) {
		$where[] = 'id not in (' . $ban . ')';
	}

	if( $teamExclude != null ) {
		$where[] = 'team not in (' . $teamExclude . ')';
	}

	if( $idExclude != null ) {
		$where[] = 'id not in (' . $idExclude . ')';
	}

	// Begin our SQL statement
	$sql = 'select * from heroes where ';

	for( $i = 0; $i < count( $where ); $i++ ) {
		$sql .= $where[ $i ];

		if( $i + 1 < count( $where ) ) {
			$sql .= ' and ';
		}
	}

	if( count( $where ) == 0 ) {
		$sql .= '1';
	}

	// Execute the query
	$result = runQuery( $sql );

	// Smash the heroes onto the heroes array
	while ( $hero = $result->fetch_assoc() ) {
		$heroes[] = $hero;		
	}

	// Grab our second hero from the results
	if( count( $heroes ) === 0 ) {
		$hero = -1;
	} else if( count( $heroes ) === 1 ) {
		$hero = $heroes[ 0 ];
	} else {	
		$hero = $heroes[ mt_rand( 0, count( $heroes) - 1 ) ];
	}

	return $hero;
}


/*
	Draw the hero
*/
function drawHeroes( $result ) {
	while ( $hero = $result->fetch_assoc() ) {
		include( 'templates/hero.tpl' );
	}
}

function drawHeroesResult( $result ) {
	foreach( $result as $hero ) {
		include( 'templates/hero-result.tpl' );
	}
}