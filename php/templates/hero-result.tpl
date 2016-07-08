<div class="hero-result large-12 columns">
	<div class="hero-top">
		<div class="hero-icon">
			<?php if( $hero[ 'team' ] != 7 ): ?>
				<img src="img/icons/teams/<?php echo $hero[ 'team' ] ?>.png">
			<?php endif; ?>
		</div> <!-- .hero-icon -->

		<div class="name">
			<?php echo $hero[ 'name' ]; ?>
		</div> <!-- .name -->
	</div> <!-- .hero-top -->

	<div class="stats">
		<div class="card-breakdown">
			<div class="stat">
				<div class="fight">
					<img src="img/icons/attack.png"><?php echo $hero[ 'fight' ]; ?>

					<div class="provides">
						<span>Provides:</span>

						<?php if( $hero[ 'strength'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'strength'] ); ?>">
								<img src="img/icons/skills/strength.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'instinct'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'instinct'] ); ?>">
								<img src="img/icons/skills/instinct.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'covert'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'covert'] ); ?>">
								<img src="img/icons/skills/covert.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'tech'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'tech'] ); ?>">
								<img src="img/icons/skills/tech.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'ranged'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'ranged'] ); ?>">
								<img src="img/icons/skills/ranged.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
					</div> <!-- .provides -->
				</div> <!-- .fight -->
			</div> <!-- .stat -->

			<div class="stat">
				<div class="buy">
					<img src="img/icons/cost.png"><?php echo $hero[ 'buy' ]; ?>

					<div class="provides">
						<span>Needs:</span>

						<?php if( $hero[ 'sp_team'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'sp_team'] ); ?>">
								<img src="img/icons/teams/<?php echo $hero[ 'team']; ?>.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>

						<?php if( $hero[ 'sp_strength'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'strength'] ); ?>">
								<img src="img/icons/skills/strength.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'sp_instinct'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'instinct'] ); ?>">
								<img src="img/icons/skills/instinct.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'sp_covert'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'covert'] ); ?>">
								<img src="img/icons/skills/covert.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'sp_tech'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'tech'] ); ?>">
								<img src="img/icons/skills/tech.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>
						
						<?php if( $hero[ 'sp_ranged'] >= 1 ): ?>
							<div class="skill-icon <?php echo iconStrength( $hero[ 'ranged'] ); ?>">
								<img src="img/icons/skills/ranged.png">
							</div> <!-- .skill-icon -->
						<?php endif; ?>	
					</div> <!-- .provides -->
				</div> <!-- .buy -->
			</div> <!-- .stat -->	
		</div> <!-- .card-breakdown -->
	</div> <!-- .stats -->
</div> <!-- .hero -->