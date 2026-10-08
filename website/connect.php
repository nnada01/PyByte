<?php
//Connect to database "pybyte" in XAMPP
$host="localhost";
$user="root";
$pass="";
$db="pybyte";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>