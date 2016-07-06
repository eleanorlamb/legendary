<div id="hero-<?php echo $hero[ 'id']; ?>" class="hero large-4 columns" data-hero='<?php echo $hero[ 'id']; ?>'>
	<div class="hidden">
		<input type="checkbox" name="hero-require" />
		<input type="checkbox" name="hero-ban" />
	</div> <!-- .hidden -->

	<div class="fancy-checkbox" data-fancy-checkbox='0'>
	</div> <!-- .fancy-checkbox -->

	<div class="name">
		<?php echo $hero[ 'name' ]; ?>
	</div>
</div> <!-- .hero -->