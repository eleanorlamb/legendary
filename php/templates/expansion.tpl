<div id="expansion-<?php echo $expansion[ 'id']; ?>" class="large-12 columns expansion" data-expansion='<?php echo $expansion[ 'id']; ?>'>

	<div class="single-checkbox">
		<input type="checkbox" name="expansion" id="expansion-ban-<?php echo $expansion[ 'id']; ?>" <?php if( $expansion[ 'id' ] == 1 ): ?>checked<?php endif; ?>/>

		<label for="expansion-ban-<?php echo $expansion[ 'id']; ?>">
			<?php echo $expansion[ 'name' ]; ?>
		</label>
	</div> <!-- .single-checkbox -->
</div> <!-- .expansion -->