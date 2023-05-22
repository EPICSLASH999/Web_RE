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
    
	<title> Administrador2 </title>

	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/access_admin3.css">
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
    
</head>
<body onload="funcionTipo()">
<?php include('../feature_adminNavbar.inc.php') ?>

<div class="principal">
	<div class="login-box">
		<h1>Insertar tipos</h1>
		<br>
		<!-- Insertar tipos -->
		<div class="user-box">
			<form id="formularioT" method="Post">
				<div class="user-box">
					<input type="text" name="tip" id="mi_tipoo" required="">
					<label>Nombre</label>
				</div>

				<div class="user-box">
					<input type="number" name="id" id="mi_id" required="">
					<label>Id</label>
				</div>
				<br>
				
				<div class="button">
					<button class="button-85" role="button" type="submit" id="btnInsertar" name="boton"  onclick="insertarTipo()">Insertar</button>
				</div>
			</form>
			
		</div>
		<br>


		<!-- Mostrar tipos -->
		<div class="tabla" id="tabla">
				<div id="tablaTipos2" ><b>[ La informacion de los tipos se mostrara aqui (Admin)]</b></div><br>
		</div>
		<br>
		<div class="button">
			<button class="button-85" role="button" onclick="return funcionTipo()">Recargar</button>
		</div>
	</div>
</div>

</body>
</html>