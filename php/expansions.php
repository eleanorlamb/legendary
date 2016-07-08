<?php

// Load the DB Connection
include( 'common.php' );

$sql = 'select id, name from expansions order by id';

$result = runQuery( $sql );

while ( $expansion = $result->fetch_assoc() ) {
	include( 'templates/expansion.tpl' );
}
