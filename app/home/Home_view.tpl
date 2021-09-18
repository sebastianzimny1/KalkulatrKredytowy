<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulatory</title>

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="{$conf->app_url} ../lib/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$conf->app_url} ../lib/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$conf->app_url} ../lib/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="{$conf->app_url} ../lib/assets/css/main.css">
            

</head>
<body class="home">
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="{$conf->action_url}"><p>Kalkulatory</p></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
                                          <li class="active"><a href="{$conf->action_url}">Strona Główna</a></li>
                                          <li><a href="{$conf->action_url}calcView">Kalkulator Kredytowy</a></li>								
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
    
    <!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">KALKULATORY</h1>
				<p class="tagline">Największa ofera kalkulatorów </p>
				<p><a href="{$conf->action_url}calcView" class="btn btn-default btn-lg" role="button">Kalkulator</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->
        <!-- Intro -->
 </div> 
        <footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
						<div class="widget-body">
							<p>
								<br>
								123-45 Sosnowiec, ul.Kalkulatorowa 12, Polska
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">kalkulatory</h3>
						<div class="widget-body">
							<p>Jesteśmy światowym liderem w kalkulatorach</p>
							
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Strona główna</a> | 
								<a href="about.html">o nas</a> |					
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright Sebastian Zimny
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
</body>
</html>