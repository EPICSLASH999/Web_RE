<?php
   SESSION_START();

   if (!empty($_POST)){
      $nom = $_POST['nom'];
      $des = $_POST['des'];
      $tipo = intval($_POST['tipo']);
         if (isset($_SESSION['alert'])){
            unset($_SESSION['alert']); 
         }

         $password_hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

         //Conexion
         $DB_USER = 'master';
         $DB_PASS = '1234';

         $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);
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

