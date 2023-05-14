<?php
    $con = mysqli_connect('localhost', 'master', '1234');
    $id = $_POST['id'];

    if (!$con)
    {
        die('No se pudo conectar: ' . mysqli_error($con));
    }
    mysqli_select_db($con, 're_db');
    $sql="DELETE FROM users Where id='".$id."'";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>