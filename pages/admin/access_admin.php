<?php
	require('../../config.inc.php'); //This imports the connection to database
	require('../../functions.php');

	$page = $_GET['page'] ?? 1;
	$page = (int)$page;

	if($page < 1)
		$page = 1;
	if ($_SESSION['USER']['admin'] != 1) {
		header("Location: ../../index.php");
		exit();
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script> -->
    <script src="../../JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>

	<!-- JS -->
	<script type="text/javascript" src="../../assets/js/scriptAdmin.js?v3"></script>
    
	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/access_admin.css">
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

<body onload='cargarTablaUsuario()'>
<?php include('../feature_adminNavbar.inc.php') ?> 


<!-- Las pestanas de arriba -->

<div class="login-wrap">

	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
	<label for="tab-1" class="tab">Agregar usuario</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up">
	<label for="tab-2" class="tab">Consultar usuario</label>
	


<div class="login-form">
	

	<!-- AQUI COMIENZA EL CUADRO DE INSERTAR -->
		<div class="sign-in-htm">
		<form id="formulario" method="Post">
		<div class='group'>
			<label class='label'>Usuario</label><input type="text" class='input' name="usu"  id="mi_usu" required="">
		</div>	
		<div class='group'>
			<label class='label'>Correo</label><input type="text" class='input' name="cor"  id="mi_cor" required="">
		</div>
		<div class='group'>
		<label class='label'>Contraseña</label><input type="text" class='input' name="pass" id="mi_pass" required="">
		</div>
		<div class='group' align="center">
		<label class='switch'>
		<label class='label'>Sera administrador</label><br><input type="checkbox" name="esAdmin"/>
		<span class='slider'></span>
		</label>
		</div>
		<br>
		<div class='group'>
		<input type="submit" class='button' id="btnInsertar" name="boton" value="Insertar" onclick="return insertarUsuario()"> 
		</div>
			</form>
		</div>
	
	<!-- AQUI COMIENZA BOTON CONSULTAR -->
	<div class="sign-up-htm">
		<form id="formularioC" method="Post">
			<div class='group'>
				<label class='label'>Usuario<input type="text" class='input' name="usu" id="mi_usu3"> 
			</div>
			<div class='group'>
			<input class="button" value = "Buscar" type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminC()"> 
			</div>
			<br>
			<div id="tabla2">
				<div id="tablaUsuarios2" ></div> <br>
			</div>
			<br>
		</form>

		<div id="tabla" class='tabla'>
        <div id="tablaUsuarioss" ><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
		</div><br>
	<!-- AQUI COMIENZA LA TABLA DE USUARIOS NORMAL -->
	<div class='group'>
<input class="button" value="recargar" type="button" name="botonConsulta" id="btnRecargar" onclick="return funcionAdmin()"> 
</div>
</div>
</div>

</body>
</html>