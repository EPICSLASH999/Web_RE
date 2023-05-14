<?php
    $con = mysqli_connect('localhost', 'master', '1234');
    $id = $_POST['id'];

    if (!$con)
    {
        die('No se pudo conectar: ' . mysqli_error($con));
    }
    mysqli_select_db($con, 're_db');
    $sql="SELECT banned FROM users WHERE id='".$id."'";
    $result = mysqli_query($con,$sql);
    $ren = mysqli_fetch_array($result);
    $banned = $ren['banned'];

    if ($banned == 'true') {
        $change = 'false';
    } else {
        $change = 'true';
    }

    $sql = "UPDATE users SET banned='".$change."' WHERE id='".$id."'";
    $result = mysqli_query($con, $sql);

    mysqli_close($con);
?>