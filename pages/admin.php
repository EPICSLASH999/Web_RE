<?php
    require('../config.inc.php'); //This imports the connection to database
 
     //conexion
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
    $DB_NAME = DB_NAME;
    $DB_HOST = DB_HOST;
    
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS);
    
    $id = $_POST['id'];

    if (!$con)
    {
        die('No se pudo conectar: ' . mysqli_error($con));
    }
    mysqli_select_db($con, 're_db');
    $sql="SELECT admin FROM users WHERE id='".$id."'";
    $result = mysqli_query($con,$sql);
    $ren = mysqli_fetch_array($result);
    $admin = $ren['admin'];

    if ($admin == 0) {
        $change = 1;
    } else {
        $change = 0;
    }

    $sql = "UPDATE users SET admin='".$change."' WHERE id='".$id."'";
    $result = mysqli_query($con, $sql);

    mysqli_close($con);
?>