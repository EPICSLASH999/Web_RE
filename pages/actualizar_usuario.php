<?php
   $id = $_POST['id'];
   $banned = $_POST['banned'];
   echo "ID: " . $id . "<br>";
   echo "Banned: " . $banned . "<br>";

   require('../config.inc.php'); //This imports the connection to database

	//conexion
   $DB_USER = DB_USER;
   $DB_PASS = DB_PASS;
	$DB_NAME = DB_NAME;
	$DB_HOST = DB_HOST;
   
   $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS);
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
