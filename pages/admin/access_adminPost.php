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
	<title> Administrador </title>

	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/access_adminPost.sass">
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

<!-- <body onload='funcionAdmin()'> -->
<body onload='llenarPost()'> 
<?php include('../feature_adminNavbar.inc.php') ?>

<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
			<label for="tab-1" class="tab">Buscar post</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up">
			<label for="tab-2" class="tab">Latest posts</label>

		<div class="login-form">
			<!-- AQUI COMIENZA BOTON CONSULTAR -->
			<div class="sign-in-htm">
				<form id="formularioPost" method="Post">
					<div class='group'>
						<label class='label'>Posts</label><input type="text" class='input' name="post" id="mi_post"> 
					</div>
					<!-- <input class="prueba" type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminC()"> -->
					<div class='group'>
					<input class='button' value='Buscar' type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminPostC()">  
					</div>
					
					<!-- <div id="tabla2"> <div id="tablaUsuarios2" > </div> <br> </div> -->
					<div id="tablaPC">
						<div id="tablaPostC" ></div>
					</div>
					<br>
				</form>
			</div>
	
			<div class="sign-up-htm">
				<div id="tablaP">
					<div id="tablaPost" ><b>[ La informacion de los 'Posts' se debera mostrar aqui ]</b></div>
				</div>
				<br><br>
				<div class='group'>
					<input class="button" value ='Recargar' type="button" name="botonConsulta" id="btnRecargar" onclick="return llenarPost()"> 
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>