<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Erubescent 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20131115

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">IDCC Hw3</a></h1>
		</div>
		<div id="menu">
			<ul>
				<?php
				// Establishing Connection with Server by passing server_name, user_id and password as a parameter
				$connection = mysql_connect("localhost", "root", "");

				// Selecting Database
				$db = mysql_select_db("accounts", $connection);
				session_start();// Starting Session
				// Storing Session
				$user_check=$_SESSION['login_user'];
				// SQL Query To Fetch Complete Information Of User
				$ses_sql=mysql_query("select username from account where username='$user_check'", $connection);
				$row = mysql_fetch_assoc($ses_sql);
				$login_session =$row['username'];
				mysql_close($connection); // Closing Connection

				echo '<li class="current_page_item"><a href="#" accesskey="1" title="">Status</a></li>';
				echo '<li><a href="upload/" accesskey="2" title="">Upload Code</a></li>';
				if(!isset($login_session)) {
					echo '<li><a href="account/" accesskey="3" title="">Login/Register</a></li>';
					echo '<li><a accesskey="4" title=""> </a></li>';
					echo '<li><a href="#" accesskey="5" title="">';
					echo 'Hello Guest!';
					echo '</a></li>';
				}else {
					echo '<li><a href="session.php" accesskey="3" title="">Logout</a></li>';
					echo '<li><a accesskey="4" title=""> </a></li>';
					echo '<li><a href="#" accesskey="5" title="">';
					echo "Hello $login_session!";
					echo '</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>
<div id="header-featured"> </div>
<div id="banner-wrapper">
	<div id="banner" class="container">
		<?php system('whoami'); ?>
		<p>This is <strong>Erubescent</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
	</div>
</div>

<div id="wrapper">
	<div id="featured-wrapper">
		
		<div class="extra2 margin-btm container">
			<div class="ebox1">
				<div class="title">
					<h2>Fusce ultrices fringilla</h2>
					<span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
				</div>
				<p>Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet at, ultrices eget, ornare et, wisi. </p>
				<a href="#" class="button">Etiam posuere</a>
			</div>		

			<div class="ebox2">
				<div class="title">
					<h2>Donec dictum metus</h2>
					<span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
				</div>
				<p>Donec pulvinar ullamcorper metus. In eu odio at lectus pulvinar mollis. Vestibulum sem magna, elementum ut, vestibulum eu, facilisis quis, arcu. Mauris a dolor. Nulla facilisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed blandit. Phasellus pellentesque, ante nec iaculis dapibus, eros justo auctor lectus.</p>
				<a href="#" class="button">Etiam posuere</a>
			</div>		

		</div>	

	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
