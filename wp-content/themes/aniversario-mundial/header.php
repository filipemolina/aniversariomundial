<!doctype html>

<html lang="en">
<head>
 	<meta charset="utf-8">

	<title>Aniversário Mundial</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

  	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Fraction Slider -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fractionslider.css">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

  	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php wp_head(); ?>

  <style type="text/css">

	html
	{
		margin-top: 0px !important;
	}

  </style>
</head>

<body>
		
	<!-- Facebook Javascript SDK -->

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Menu Principal -->
	
	<nav class="navbar navbar-inverse navbar-fixed-top">

		<div class="container">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
			    	<span class="sr-only">Toggle navigation</span>
			    	<span class="icon-bar"></span>
			    	<span class="icon-bar"></span>
			    	<span class="icon-bar"></span>
			    </button>

				<a class="navbar-brand" href="#"><img alt="Logo" src="<?php bloginfo('template_url'); ?>/img/menu/logo.png"></a>

			</div>

			<div class="collapse navbar-collapse" id="menu-principal">
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="javascript:void(0)" data-section="banner" class="openSans branca bold">OFERTAS</a></li>
					<li><a href="javascript:void(0)" data-section="video" class="openSans branca bold">CAMPANHA</a></li>
					<li><a href="javascript:void(0)" data-section="instagram" class="openSans branca bold">#ÉHOJEMUNDIAL</a></li>
					<li><a href="javascript:void(0)" data-section="downloads" class="openSans branca bold">DOWNLOADS</a></li>
					<li><a href="javascript:void(0)" data-section="making-of" class="openSans branca bold">MAKING OF</a></li>
				</ul>

			</div>

		</div>

	</nav>

