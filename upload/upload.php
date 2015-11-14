<?php
$isdone1 = move_uploaded_file($_FILES["mapper"]["tmp_name"], "/var/www/html/files/"."mapper.py");
$isdone2 = move_uploaded_file($_FILES["reducer"]["tmp_name"], "/var/www/html/files/"."reducer.py");
$isdone3 = move_uploaded_file($_FILES["input"]["tmp_name"], "/var/www/html/files/"."input");
if($isdone1 == true && $isdone2 == true) {
    echo "upload succeed<br>";
}
system('sudo su hadoopuser -c "../exec/run.sh"');
/* header("Location: ../"); */

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
