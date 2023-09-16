<?php

$dbHost = 'localhost';

$dbUsername = 'student1';

$dbPassword = 'pass';

$dbDatabase = 'baseball_01';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if($conn -> connect_error){

    die("Connection Failed: " . $conn->connect_error);

}else{

    echo "Connection Successful";

}

?>