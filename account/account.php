<?php

$servername = "localhost";
$username = $_POST["username"];
$password = $_POST["password"];


session_start();
$_SESSION['login_user']= $username;
if (isset($_POST['login']) || isset($_POST['register'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else {
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "root", "");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("accounts", $connection);

		if(isset($_POST['login'])) {
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from account where password='$password' AND username='$username'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				echo "Login Successful<br>Waiting for redirecting...<br>";
				header("refresh:3; url=../"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
				echo $error."<br>";
				header("refresh:3; url=./"); // Redirecting To Other Page
			}
			mysql_close($connection); // Closing Connection
		}elseif(isset($_POST['register'])) {
			echo 'Register<br>';
			$query = mysql_query("SELECT * FROM account WHERE username='$username'", $connection);
			//$query = mysql_query("SELECT * FROM account", $connection);
			$rows = mysql_num_rows($query);
/*
			echo "count= $query".'<br>';
			echo "query=".mysql_result($query, 0).'<br>';
			echo "row_num=".$rows.'<br>';
			echo "row_num=".mysql_num_rows($query).'<br>';
*/
			if ($rows > 0) {
				$error = "Account has been registered";
				echo "$error<br>";
			}elseif($rows == 0) {
				echo "Account Created!<br>";
				echo "Username: ".$username."<br>";
				echo "Password: ".$password."<br>";
				$query = mysql_query("insert into account (username, password, submit_count) values ('$username', '$password', 0)", $connection);
				$_SESSION['login_user']=$username; // Initializing Session
			}
			header("refresh: 5; url=./");
			mysql_close($connection); // Closing Connection
		}
	}
}

/*
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
?> 
