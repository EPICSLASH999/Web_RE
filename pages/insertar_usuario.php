<?php
   SESSION_START();
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
         $DB_USER = 'master';
         $DB_PASS = '1234';

         $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);

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
