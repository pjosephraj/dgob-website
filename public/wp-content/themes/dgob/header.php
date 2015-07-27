<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php dgob_timestamped_url( 'style.css' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page-wrapper">

	<header class="page">
		<div class="container-fluid clearfix visible-sm-block visible-md-block visible-lg-block">
			<form class="search pull-right" method="GET" action="/">
				<div class="input-group">
					<input type="text" class="form-control" name="s" placeholder="Suche">
					<span class="input-group-addon">
						<button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</form>
			<div class="logo">
				<a href="/">
					<img src="<?php dgob_timestamped_url( 'images/logo.svg' ); ?>" alt="Logo des Deutschen Go-Bunds">
				</a>
			</div>
			<div class="dgob">Deutscher Go-Bund</div>
		</div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
							data-target="#nav-main-collapse" aria-expanded="false">
						<span class="sr-only">Navigation umschalten</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="/" class="navbar-brand visible-xs-inline">Deutscher Go-Bund</a>
				</div>
				<div id="nav-main-collapse" class="collapse navbar-collapse">
					<?php dgob_main_menu(); ?>
				</div>
			</div>
		</nav>
	</header>

	<div id="main-content">
		<div class="container-fluid">
