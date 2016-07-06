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
		<div class="large-12 columns header">
			<h1>Legendary</h1>
			<h3>Game Setup Tool</h3>
		</div> <!-- .header -->

		<div class="large-12 columns body">
			<form id="randomizer">
				<div class="row player-count">
					<div class="medium-6 columns">
						<label for="player-select">Number of Players:</label>
					
						<select id="player-select" name="player-select">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5" selected>5</option>
						</select> 
					</div>

				</div> <!-- .player-count -->	
			</form>

			<div class="setup">
				<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Expansions</a>
						
						<div class="accordion-content expansion-list" id="expansion-list" data-tab-content>
							<div class="row">
								<div class="help-text large-12 columns">
									Select which expansions you wish to include content from.
								</div>

								<?php include 'php/expansions.php'; ?>
							
								<div class="reset">
									<a id="filter-content"><i class="fa fa-filter" aria-hidden="true"></i>Filter Content</a>
								</div> <!-- .reset -->							
							</div> <!-- .row -->
						</div> <!-- .hero-list -->
					</li>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Heroes</a>
						
						<div class="accordion-content hero-list" id="hero-list" data-tab-content>
							<div class="row">
								<div class="help-text large-12 columns">
									Click on a hero to include (<i class="fa fa-check" aria-hidden="true"></i>), exclude (<i class="fa fa-times" aria-hidden="true"></i>), or no set no preference (<i class="fa fa-square-o" aria-hidden="true"></i>). If you include more than the number of heroes allowed by the number of players and plot, heroes will be randomly selected from the ones selected.
								</div>

								<div id="heroes"></div> <!-- #heroes -->

								<div class="reset">
									<a id="hero-reset"><i class="fa fa-reply" aria-hidden="true"></i>Reset</a>
								</div> <!-- .reset -->
							</div> <!-- .row -->
						</div> <!-- .hero-list -->
					</li>
				</ul> <!-- .vertical.menu -->
			</div>

			<div id="randomize-button" class="randomize">
				<a>
					<i class="fa fa-refresh" aria-hidden="true"></i>Generate Setup
				</a>
			</div> <!-- .randomize -->

			<div class="results row">
				<div class="large-4 columns heroes">
					<h3>Heroes</h3>

					<div id="heroes-result" class="row"></div>
				</div> 
			</div> <!-- .results -->

			<div class="cookie-warning">
				<span>Notice:</span> This site uses cookies to remember the options you select. Super heroes, teams, images, and content are property of Upper Deck and Marvel. This tool is in no way associated with Upper Deck or Marvel. If you don't have Legendary, you should <a href="http://upperdeckstore.com/legendary-a-marvel-deck-building-game.html" target="_blank">go buy it</a> now.
			</div> <!-- .cookie-warning -->
		</div> <!-- .body -->	
	</div> <!-- .row -->

	<script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/what-input/what-input.js"></script>
	<script src="bower_components/foundation-sites/dist/foundation.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
