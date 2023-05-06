<?php
    $database = "re_db";
    $con = mysqli_connect("localhost","master","1234",$database);

    if(!$con){
        echo "Connection Failed" . mysqli_connect_error();
    }
?>