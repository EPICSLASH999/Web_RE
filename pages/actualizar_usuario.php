<?php
   $id = $_POST['id'];
   $banned = $_POST['banned'];
   echo "ID: " . $id . "<br>";
   echo "Banned: " . $banned . "<br>";
   $con = mysqli_connect('localhost','master','1234');
   if (!$con){
      die('No se pudo conectar: ' . mysqli_error($con)); 
   }
   mysqli_select_db($con,'re_db');
   if (!$result) {
    printf("Error en la consulta: %s\n", mysqli_error($con));
    exit();
    }
   $sql="UPDATE users SET banned='" . $banned . "' WHERE id='" . $id . "'";
   $result = mysqli_query($con,$sql); 
   mysqli_close($con);
?>
