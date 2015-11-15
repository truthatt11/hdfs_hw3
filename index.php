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

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 0.5em;
}
</style>

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
		<table style="width:90%">
		<?php
			$connection = mysql_connect("localhost", "root", "");
			  // Selecting Database
			$db = mysql_select_db("accounts", $connection);
			session_start();// Starting Session
			  // Storing Session
			$user_check=$_SESSION['login_user'];
			  // SQL Query To Fetch Complete Information Of User
			$ses_sql=mysql_query("select * from account where username='$user_check'", $connection);
			$row = mysql_fetch_assoc($ses_sql);
			$login_session =$row['username'];
			$count =$row['submit_count'];
			mysql_query("update account set submit_count=$count+1 where username='$user_check'");
			mysql_close($connection); // Closing Connection

			if(!isset($user_check)) { echo "Login first!<br>"; }
			else {
				for($i=0; $i<$count; $i=$i+1) {
					echo '<tr>';
					echo "<td>Submission #$i</td>";
					echo "<td> <a href=\"../files/$user_check/$i/out\">Output</a> </td>";
					echo '</tr>';
				}
			}
/*
  <tr>
    <td>John</td>
    <td>Doe</td>		
    <td>80</td>
  </tr>
*/
		?>
		</table>
	</div>
</div>

<div id="wrapper">
	<div id="featured-wrapper">
		
		<div class="extra2 margin-btm container">
			<div class="ebox1">
				<div class="title">
					<h2>       </h2>
					<span class="byline">            </span>
				</div>
				<p>    </p>
				<a href="#" class="button">Test</a>
			</div>		

			<div class="ebox2">
				<div class="title">
					<h2>       </h2>
					<span class="byline">            </span>
				</div>
				<p>    </p>
				<a href="#" class="button">Test</a>
			</div>		

		</div>	

	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
