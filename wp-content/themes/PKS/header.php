<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKS Osaava</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php wp_head(); ?>
  </head>
  <body>
  <div class="wrapper">
  <!-- NAVIGATION AND HEADER -->  
	<div class="mnavigation">
		  <div class="container">
		    <div class="row">
			  <div class="logo col-lg-2 col-md-2 col-sm-2 col-xs-6"><h1><a href="<?php bloginfo('url'); ?>">PKS OSAAVA</a></h1></div>
			  <div class="menu col-lg-6 col-md-6 col-sm-6 col-xs-6">		  	
			  	<ul id="menu">
				   <li><a href="<?php bloginfo('url'); ?>">ETUSIVU</a></li>
				   <li><a href="<?php bloginfo('url'); ?>#ideat">IDEAT</a></li>
				   <li><a href="<?php bloginfo('url'); ?>#tietoa">TIETOA PALVELUSTA</a></li>
				   <li><a href="#">OPASHAKU</a></li>
				</ul>			
			  </div>
			  <div class="login_n_search col-lg-3 col-md-3 col-sm-2 col-xs-12">
			  	<ul id="login_n_search">
			  		<li><a href="#"><span>Kirjaudu</span> <i class="fa fa-lock"></i></a></li>
			  	</ul>
			  </div>
			  <div class="social col-lg-1 col-md-1 col-sm-2 col-xs-12">
			   	<ul id="social">				  	
				  	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				  	<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  	</ul>
			  </div>
			  <div class="mobile_menu_icon col-lg-1 col-md-1 col-sm-2 col-xs-12">
			  		<i id="menu_trigger" class="fa fa-bars"></i>
			  </div>
			</div>			
		  </div>	
	</div>
	<div class="mobile_menu" style="display: none;">
		  <div class="container">
			  <div class="row">
				<div class="col-xs-6">
					<div class="login">
			  			<a href="#"><span>Kirjaudu</span><i class="fa fa-lock"></i></a>
			  		</div>
			  	</div>
				<div class="social_m col-xs-6">
					<div>				  	
					  	<a href="#"><i class="fa fa-facebook"></i></a>
					  	<a href="#"><i class="fa fa-twitter"></i></a>
			  	    </div>
				</div>
				<div class="login_form col-xs-12">
					<div class="form">
						<form role="form">				  
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Salasana">
						    <div class="form_buttons">
							    <button type="submit" class="btn btn-primary btn-lg">KIRJAUDU</button>
							    <button type="submit" class="btn btn-primary btn-lg">LUO TUNNUS</button>
						    </div>
						</form>
						<span class="forgot_pass"><p>Forgot password?</p></span>
					</div>
				</div>
				<div class="menu_m col-xs-12">
					<ul>
					   <li class="active"><a href="<?php bloginfo('url'); ?>">ETUSIVU</a></li>
					   <li class="inactive"><a href="<?php bloginfo('url'); ?>#ideat">IDEAT</a></li>
					   <li class="inactive"><a href="<?php bloginfo('url'); ?>#tietoa">TIETOA PALVELUSTA</a></li>
					   <li class="inactive"><a href="#">OPASHAKU</a></li>
					</ul>			
				</div>
			  </div>
		  </div>
	</div>
    
