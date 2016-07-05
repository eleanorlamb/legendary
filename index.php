<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Legendary Randomizer</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/app.css">
</head>

<body>
	<div class="row">
		<div class="large-12 columns body">
			<h1>Legendary Randomizer</h1>

			<form id="randomizer">
				<div class="row player-count">
					<div class="medium-6 columns">
						<label for="player-select">Number of Players:</label>
					
						<select id="player-select" name="player-select">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select> 
					</div>

				</div> <!-- .player-count -->	
			</form>

			<div class="setup">
				<ul class="accordion" data-accordion data-allow-all-closed="true">
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Expansions</a>
						
						<div class="accordion-content expansion-list" id="expansion-list" data-tab-content>
							<?php include 'php/legendary.php'; ?>
						</div> <!-- .hero-list -->
					</li>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Heroes</a>
						
						<div class="accordion-content hero-list" id="hero-list" data-tab-content>
							<?php include 'php/legendary.php'; ?>
						</div> <!-- .hero-list -->
					</li>
				</ul> <!-- .vertical.menu -->
			</div>
		</div> <!-- .body -->	
	</div> <!-- .row -->

	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/what-input/what-input.js"></script>
	<script src="bower_components/foundation-sites/dist/foundation.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
