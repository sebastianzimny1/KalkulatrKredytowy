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
                                    <li><a href="{$conf->action_url}">Strona Główna</a></li>
                                    <li class="active"><a href="{$conf->action_url}calcView">Kalkulator Kredytowy</a></li>			
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
			</div>
		</div>
	</header>
	<!-- /Header -->
        <!-- Intro -->
	<div class="container text-center">
            <form action="{$conf->action_root}calcCompute" method="post" class="pure-form pure-form-stacked">
            <h2>Kalkulator kredytowy</h2>	
                <div class="row">
                    <div class="col-sm-4">
                        <label for="id_x">Kwota: </label>
                        <br></br>
                        <input id="id_x" type="text" name="x" value="{$form->x}" />
                    </div>
                    <div class="col-sm-4">
                        <label for="id_op">Oprocentowanie: </label>
                        <br></br>
                            <select name="op">
                                    <option value="1%">1%</option>
                                    <option value="2%">2%</option>
                                    <option value="3%">3%</option>
                                    <option value="5%">5%</option>
                                    <option value="10%">10%</option>
                            </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="id_y">Długość spłaty w miesiącach: </label>     
                        <br></br>
                        <input id="id_y" type="text" name="y" value="{$form->y}" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 50px;">
                            <input type="submit" value="Oblicz" />  
                        </div>
                    </div>
            </form>	
<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>
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