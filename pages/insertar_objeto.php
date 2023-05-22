<?php
   require('../config.inc.php'); //This imports the connection to database
   require('../functions.php');

   if (!empty($_POST)){
      $nom = $_POST['nom'];
      $des = $_POST['des'];
      $tipo = intval($_POST['tipo']);
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
         //Consulta

         $sql = $con->prepare("INSERT INTO re4_objetos(nombre, descripcion, tipo) VALUES(:nom, :des, :tipo)");

         //parametros
         $sql->bindParam(':nom', $nom);
         $sql->bindParam(':des', $des);
         $sql->bindParam(':tipo', $tipo);

         //ejecutar
         $sql->execute();


   } else {
      if ($sql) {
         $_SESSION['success'] = "Objeto registrado correctamente";
      } else {
         $_SESSION['error'] = "Error al registrar el objeto";
      }
      header("Location: access_admin.html");
      exit();
   }
?>

