<?php
   SESSION_START();
   if (!empty($_POST)){
      $id = $_POST['id'];
      $tipo = $_POST['tip'];
         if (isset($_SESSION['alert'])){
            unset($_SESSION['alert']); 
         }
         $password_hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
         
         //conexion
         $DB_USER = 'master';
         $DB_PASS = '1234';

         $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);

         if (!$con){
            die('No se pudo conectar: ' . mysqli_error($con)); 
         }
         //consulta
         $sql = $con->prepare("INSERT INTO re4_tipos(id, nombreTipo) VALUES(:id, :tipo)");

         //parametros
         $sql->bindParam(':id', $id);
         $sql->bindParam(':tipo', $tipo);
         
         //ejecutar
         $sql->execute();

         $con = null;
   } else {
      if ($result) {
         $_SESSION['success'] = "Tipo registrado correctamente";
      } else {
         $_SESSION['error'] = "Error al registrar el tipo";
      }
      header("Location: access_admin.html");
      exit();
   }
?>

