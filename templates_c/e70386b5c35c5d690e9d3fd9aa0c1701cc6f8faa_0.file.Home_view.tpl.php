<?php
/* Smarty version 3.1.30, created on 2021-09-18 12:46:22
  from "D:\Programy\Xamp\htdocs\KalkulatorKredytowy\app\home\Home_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6145c37e069817_88120442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e70386b5c35c5d690e9d3fd9aa0c1701cc6f8faa' => 
    array (
      0 => 'D:\\Programy\\Xamp\\htdocs\\KalkulatorKredytowy\\app\\home\\Home_view.tpl',
      1 => 1631961976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6145c37e069817_88120442 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>require_once dirname(__FILE__) .'/../config.php';<?php echo '?>';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulatory</title>

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
 ../lib/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
 ../lib/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
 ../lib/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
 ../lib/assets/css/main.css">
            

</head>
<body class="home">
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
"><p>Kalkulatory</p></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
                                          <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
">Strona G????wna</a></li>
                                          <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcView">Kalkulator Kredytowy</a></li>								
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
    
    <!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">KALKULATORY</h1>
				<p class="tagline">Najwi??ksza ofera kalkulator??w </p>
			</div>
		</div>
	</header>
	<!-- /Header -->
        <!-- Intro -->
	<div class="container">
			<div class="row">
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcView" class="btn btn-default btn-lg" role="button">Kalkulator</a></p>
			</div>
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
							<p>Jeste??my ??wiatowym liderem w kalkulatorach</p>
							
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
								<a href="#">Strona g????wna</a> | 
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
</html><?php }
}
