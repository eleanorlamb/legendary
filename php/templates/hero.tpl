<div id="hero-<?php echo $hero[ 'id']; ?>" class="hero large-4 columns" data-hero='<?php echo $hero[ 'id']; ?>'>
	<div class="hidden">
		<input type="checkbox" name="hero-require" />
		<input type="checkbox" name="hero-ban" />
	</div> <!-- .hidden -->

	<div class="fancy-checkbox" data-fancy-checkbox='0'>
	</div> <!-- .fancy-checkbox -->

	<div class="name">
		<span class="hero-icon">
			<?php if( $hero[ 'team' ] != 7 ): ?>
				<img src="img/icons/teams/<?php echo $hero[ 'team' ] ?>.png">
			<?php endif; ?>
		</span>

		<span class="hero-name">
			<?php echo $hero[ 'name' ]; ?>
		</span>
	</div>
</div> <!-- .hero -->