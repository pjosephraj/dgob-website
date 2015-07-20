<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div class="container-fluid clearfix visible-sm-block visible-md-block visible-lg-block">
		<form class="search pull-right">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Suche">
					<span class="input-group-addon">
						<button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
			</div>
		</form>
		<div class="logo">
			<a href="#">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/logo.svg" alt="Logo des Deutschen Go-Bunds">
			</a>
		</div>
		<div class="dgob">Deutscher Go-Bund</div>
	</div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#nav-main-collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand visible-xs-inline">Deutscher Go-Bund</a>
			</div>
			<div id="nav-main-collapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">
							Go lernen <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Einführung</a></li>
							<li><a href="#">Regeln</a></li>
							<li><a href="#">Kleiner Go-Kurs</a></li>
							<li><a href="#">Go spielen</a></li>
							<li><a href="#">Go-Videos</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">
							Verein <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Bundesverband</a></li>
							<li><a href="#">Landesverbände</a></li>
							<li><a href="#">Mitglied werden</a></li>
							<li><a href="#">Satzung</a></li>
							<li><a href="#">Nachwuchs</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">
							Veranstaltungen <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Spielabende</a></li>
							<li><a href="#">Turniere</a></li>
							<li><a href="#">Deutschland-Pokal</a></li>
							<li><a href="#">Meisterschaften</a></li>
							<li><a href="#">Bundesliga</a></li>
							<li><a href="#">Jugend-Turniere</a></li>
							<li><a href="#">Online-Turniere</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">
							Zeitung <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Aktuelle Ausgabe</a></li>
							<li><a href="#">Archiv</a></li>
							<li><a href="#">Problemecke</a></li>
						</ul>
					</li>
					<li><a href="#">Forum</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						   aria-expanded="false">
							Service <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Kontakt</a></li>
							<li><a href="#">Links & Downloads</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>