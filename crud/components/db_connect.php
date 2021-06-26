<?php 
$hostname = "173.212.235.205";
$username = "nejatcod_library_website";
$password = "Khashi67!";
$dbname = "nejatcod_cr10-yasnejat-biglibrary";
// create connection
$connect = new  mysqli("173.212.235.205", $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}

