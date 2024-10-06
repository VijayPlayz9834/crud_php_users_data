<?php
$servername="localhost";
$username="root";
$password="";
$database="vj";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("database not connected".mysqli_connect_error());
    }
    // echo"database connected succefully";

?>