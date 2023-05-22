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
	<script type="text/javascript" src="../../assets/js/scriptAdmin.js?v1"></script>
    <!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/access_admin2.css">
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

	<title> Administrador2 </title>
    
</head>

<body onload="CargarTablaObjeto(); crearSelectorTipo();">
<?php include('../feature_adminNavbar.inc.php') ?>
<!-- Las pestanas de arriba -->
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
			<label for="tab-1" class="tab">Agregar Objeto</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up">
			<label for="tab-2" class="tab">Consultar Objeto</label>

		<div class="login-form">
			<!-- Solo el sign-in -->
			<div class="sign-in-htm">
				<div>
					<div id="lugarSelectorTipo"> Lugar donde sale el selector</div>
				</div>
			</div>	
			<!-- Solo el sign-ip -->
			<div class="sign-up-htm">
				<form id="formularioC" method="Post">
					<div class='group'>
						<label class='label'>Objeto a consultar:</label><input placeholder="Nombre del objeto" class='input' type="text" name="obj" id="mi_objeto">
					</div>
					<div class='group'>
						<input class="button" type="button" name="botonConsulta" id="btnBuscar" value="Buscar" onclick="return funcionAdminCB()"> 
					</div>
					<div id="tabla2B">
						<div id="tablaObjetos" ></div> <br>
					</div>
					<br>
				</form>
				
				<div class='tabla' id="tabla">
						<div id="tablaObjetos2" ><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
				</div><br>
				<div class='group'>
					<input type='button' class="button" value='recargar' onclick="return funcionObjeto()">
				</div>
			</div>

		</div>
	</div>
</div>


</body>
</html>