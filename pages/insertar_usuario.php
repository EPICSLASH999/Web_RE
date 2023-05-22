<?php
   require('../config.inc.php'); //This imports the connection to database
   require('../functions.php');

   if (!empty($_POST)){
      $usu = $_POST['usu'];
      $pass = $_POST['pass'];
      $cor = $_POST['cor'];
      $nivel = $_POST['esAdmin'] == 'on'? 1:0;
         if (isset($_SESSION['alert'])){
            unset($_SESSION['alert']); 
         }
         $password_hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

         //conexion
         $DB_USER = DB_USER;
         $DB_PASS = DB_PASS;
         $DB_NAME = DB_NAME;
         $DB_HOST = DB_HOST;
         
         $con = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);

         if (!$con){
            die('No se pudo conectar: ' . mysqli_error($con)); 
         }
         //consulta
         $sql = $con->prepare("INSERT into users(username, password, email, admin,date) 
         values(:usu, :pass, :cor, :nivel, NOW())");

         //parametros
         $sql->bindParam(':usu', $usu);
         $sql->bindParam(':pass', $password_hash);
         $sql->bindParam(':cor', $cor);
         $sql->bindParam(':nivel', $nivel);
         //ejecutar
         $sql->execute();
   } else {
      if ($sql) {
         $_SESSION['success'] = "Usuario registrado correctamente";
      } else {
         $_SESSION['error'] = "Error al registrar el usuario";
      }
      header("Location: access_admin.html");
      exit();
   }
?>
