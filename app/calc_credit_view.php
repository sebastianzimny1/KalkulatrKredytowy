<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulatory</title>

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/main.css">
            

</head>
<body class="home">

    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="index.html"><p>Kalkulatory</p></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>					
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
<form action="<?php print(_APP_URL);?>/app/calc_credit.php" method="post" class="pure-form pure-form-stacked">
        <legend>Kalkulator</legend>	
        <fieldset>
            <label for="id_x">Kwota: </label>
            <input id="id_x" type="text" name="x" value="<?php if(isset($x)) print($x); ?>" /><br />
            <label for="id_op">Oprocentowanie: </label>
            <select name="op">
                    <option value="1%">1%</option>
                    <option value="2%">2%</option>
                    <option value="3%">3%</option>
                    <option value="5%">5%</option>
                    <option value="10%">10%</option>
	<</select><br />
	<label for="id_y">Długość spłaty w miesiącach: </label>
	<input id="id_y" type="text" name="y" value="<?php if(isset($y)) print($y); ?>" /><br />
	</fieldset>
        <input type="submit" value="Oblicz" />
</form>	
  
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #9a1a27; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style=" border-radius: 5px; background-color: #a9c3e1; width:300px;">
<?php echo 'Twoja rata będzie wynosić: '.$result; ?>
</div>
<?php } ?>
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