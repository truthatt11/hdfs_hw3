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

if(!file_exists("../files/$user_check")) {
	system("mkdir ../files/$user_check");
}
system("mkdir ../files/$user_check/$count");
$isdone1 = move_uploaded_file($_FILES["mapper"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."mapper.py");
$isdone2 = move_uploaded_file($_FILES["reducer"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."reducer.py");
$isdone3 = move_uploaded_file($_FILES["input"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."input");
if($isdone1 == true && $isdone2 == true&& $isdone3 == true) {
    echo "upload succeed<br>";
}

shell_exec('sudo su hadoopuser -c "../exec/run.sh"& > /dev>null &');
header("Location: ../");

/*
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/
?> 
