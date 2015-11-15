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
	shell_exec("mkdir ../files/$user_check");
}
shell_exec("mkdir ../files/$user_check/$count");
$isdone1 = move_uploaded_file($_FILES["mapper"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."mapper.py");
$isdone2 = move_uploaded_file($_FILES["reducer"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."reducer.py");
$isdone3 = move_uploaded_file($_FILES["input"]["tmp_name"], "/var/www/html/files/$user_check/$count/"."input");
if($isdone1 == true && $isdone2 == true&& $isdone3 == true) {
    echo "upload succeed<br>";
}

shell_exec("chmod a+x ../files/$user_check/$count/*.py");

$BIN_PATH='/home/hadoopuser/hadoop/bin';
shell_exec('echo "#!/bin/bash" > run.sh');
shell_exec("echo '{$BIN_PATH}/hdfs dfs -mkdir /files' >> run.sh");
shell_exec("echo '{$BIN_PATH}/hdfs dfs -copyFromLocal ../files/$login_session/$count/input /files/input' >> run.sh");
shell_exec("echo '{$BIN_PATH}/hadoop jar /home/hadoopuser/hadoop/share/hadoop/tools/lib/hadoop-streaming-2.6.1.jar \\' >> run.sh");
shell_exec("echo '             -mapper \"python ../files/$login_session/$count/mapper.py\" \\' >> run.sh");
shell_exec("echo '             -reducer \"python ../files/$login_session/$count/reducer.py\" \\' >> run.sh");
shell_exec("echo '             -input '/files/input' \\' >> run.sh");
shell_exec("echo \"             -output '/log_outdir'\" >> run.sh");
shell_exec("echo \"$BIN_PATH/hdfs dfs -copyToLocal  /log_outdir/* ../files/*\" >> run.sh");
shell_exec("echo \"\" >> run.sh");

shell_exec('chmod a+x run.sh');

system("sudo su hadoopuser -c \"./run.sh & > /dev>null &\"");
//system("sudo su hadoopuser --command \"./run.sh\"");

header("Location: ../");

?> 
