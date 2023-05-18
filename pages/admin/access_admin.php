<?php
	require('../../config.inc.php'); //This imports the connection to database
	require('../../functions.php');

	$page = $_GET['page'] ?? 1;
	$page = (int)$page;

	if($page < 1)
		$page = 1;
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script> -->
    <script src="../../JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>

	<!-- JS -->
	<script type="text/javascript" src="../../assets/js/scriptAdmin.js?v2"></script>
    
	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/estilo2.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/root_style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/features/scrollBar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/features/navbar.css">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<title> Administrador </title>
</head>

<body onload='funcionAdmin()'>
<?php include('../feature_adminNavbar.inc.php') ?> 
<center><h2>Administrador</h2>
	<img src="../../assets/images/pages/admin/icon.png" height="250" width="350">
	<!-- AQUI COMIENZA EL CUADRO DE INSERTAR -->
	<div id="cuadro">
		<h1> Agregar Usuarios </h1>
		<form id="formulario" method="Post">
			<label>Usuario: </label><br><input type="text" name="usu"  id="mi_usu" required=""><br>
			<label>Correo: </label><br><input type="text" name="cor"  id="mi_cor" required=""><br>
			<label>Contraseña: </label><br><input type="text" name="pass" id="mi_pass" required=""><br>
			<label>¿Sera administrador? </label><br><input type="checkbox" name="esAdmin"/> <br>
		<input type="submit" id="btnInsertar" name="boton" value="Insertar" onclick="return insertarUsuario()"> 
		</form>
	</div>
	<!-- AQUI COMIENZA BOTON CONSULTAR -->
	<br>
	<div id="cuadro2">
	<h1> Consultar usuarios </h1>
		<form id="formularioC" method="Post">
			Usuario:<input type="text" name="usu" id="mi_usu3"> 
			<input class="prueba" type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminC()"> 
			<br>
			<div id="tabla2">
				<div id="tablaUsuarios2" ></div> <br>
			</div>
			<br>
		</form>
	</div>
	<!-- AQUI COMIENZA LA TABLA DE USUARIOS NORMAL -->
<div id="tabla">
        <div id="tablaUsuarios" ><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
</div>
</center>
<input class="prueba" type="button" name="botonConsulta" id="btnRecargar" onclick="return funcionAdmin()"> 
<br>
<br>
</body>
</html>