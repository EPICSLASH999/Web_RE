<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
	<script type="text/javascript" src="./js/scriptAdmin.js" type="application/javascript"></script>
    <script src="./js/scriptAdmin.js"></script>
    
	<title> Administrador2 </title>
    
</head>

<body onload="funcionObjeto(); crearSelectorTipo();">


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