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


</head>

<!-- <body onload='funcionAdmin()'> -->
<body onload='funcionAdminPost()'> 
<?php include('../feature_adminNavbar.inc.php') ?>

<center><h2>Administra Post!</h2>
	<img src="../../assets/images/pages/admin/icon.png" height="250" width="350">
    <!-- SOLAMENTE SE REQUIERE ELIMINAR Y CONSULTAR EDI ATTE: Edi u.u -->

	<!-- AQUI COMIENZA BOTON CONSULTAR -->
	<br>
	<div id="cuadro2">
	<h1> Consultar Post's </h1>
		<form id="formularioPost" method="Post">
			Posts: <input type="text" name="post" id="mi_post"> 
            
            <!-- <input class="prueba" type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminC()"> -->
            <input class="prueba" type="button" name="botonConsulta" id="btnBuscar"  onclick="return funcionAdminPostC()">  
			 
			<br>
            <!-- <div id="tabla2"> <div id="tablaUsuarios2" > </div> <br> </div> -->
			<div id="tablaPC">
				<div id="tablaPostC" ></div> <br>
			</div>
			<br>
		</form>
	</div>
<div id="tablaP">
        <div id="tablaPost" ><b>[ La informacion de los 'Posts' se debera mostrar aqui ]</b></div>
</div>
</center>
<input class="prueba" type="button" name="botonConsulta" id="btnRecargar" onclick="return funcionAdminPost()"> 
<br>
<br>
</body>
</html>