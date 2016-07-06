<?php

// Load the DB Connection
include( 'config.php' );

$sql = 'select id, name from expansions order by id';

if ( !$result = $db->query( $sql ) ) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "\n";
    echo "Error: " . $db->error . "\n";
    exit;
} ?>


<?php while ( $expansion = $result->fetch_assoc() ): ?>
	<?php if( $expansion[ 'id' ] != 0 ): ?>
		<div id="expansion-<?php echo $expansion[ 'id']; ?>" class="expansion" data-expansion='<?php echo $expansion[ 'id']; ?>'>

			<div class="single-checkbox">
				<input type="checkbox" name="expansion-ban-<?php echo $expansion[ 'id']; ?>" id="expansion-ban-<?php echo $expansion[ 'id']; ?>" <?php if( $expansion[ 'id' ] == 1 ): ?>checked<?php endif; ?>/>

				<label for="expansion-ban-<?php echo $expansion[ 'id']; ?>">
					<?php echo $expansion[ 'name' ]; ?>
				</label>
			</div> <!-- .single-checkbox -->
		</div> <!-- .expansion -->
	<?php endif; ?>
<?php endwhile; 

// The script will automatically free the result and close the MySQL
// connection when it exits, but let's just do it anyways
$result->free();
$db->close();