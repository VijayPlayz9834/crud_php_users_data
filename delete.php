<?php
include "db_conn.php";
$id =$_GET['id'];
$sql = "DELETE FROM `crud` WHERE id=$id";
$result = mysqli_query($conn,$sql);
if ($result) {
    # code...
    header("location:index.php?msg=Record deleted successfully");
}else{
    echo"failed: ".mysqli_error($conn);
}

?>