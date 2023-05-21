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

	<title> Administrador2 </title>
    
</head>

<body onload="funcionObjeto(); crearSelectorTipo();">
<?php include('../feature_adminNavbar.inc.php') ?>

		<h1> Agregar Objeto </h1>
<!-- Insertar objetos -->
<div>
	<div id="lugarSelectorTipo"> Lugar donde sale el selector</div>
</div>
<!-- Consultar objetos -->
<div>
		<form id="formularioC" method="Post">
			Objeto a consultar:<input type="text" name="obj" id="mi_objeto"> <br>
			<input class="prueba" type="button" name="botonConsulta" id="btnBuscar" value="Buscar" onclick="return funcionAdminCB()"> 
			<br>
			<div id="tabla2B">
				<div id="tablaObjetos" ></div> <br>
			</div>
			<br>
		</form>
</div>
<!-- Mostrar objetos -->
<div id="tabla">
        <div id="tablaObjetos2" ><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
</div>

<button onclick="return funcionObjeto()">Recargar</button>
</body>
</html>