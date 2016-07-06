<?php

// Load the DB Connection
include( 'config.php' );

$sql = 'select id, name, team from heroes order by name';

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


<?php while ( $hero = $result->fetch_assoc() ): ?>
	<?php if( $hero[ 'id' ] != 0 ): ?>
		<div id="hero-<?php echo $hero[ 'id']; ?>" class="hero large-4 columns" data-hero='<?php echo $hero[ 'id']; ?>'>
			<div class="hidden">
				<input type="checkbox" name="require" />
				<input type="checkbox" name="ban" />
			</div> <!-- .hidden -->

			<div class="fancy-checkbox" data-fancy-checkbox='0'>
			</div> <!-- .fancy-checkbox -->

			<div class="name">
				<?php echo $hero[ 'name' ]; ?>
			</div>
		</div> <!-- .hero -->
	<?php endif; ?>
<?php endwhile; 

// The script will automatically free the result and close the MySQL
// connection when it exits, but let's just do it anyways
$result->free();
$db->close();