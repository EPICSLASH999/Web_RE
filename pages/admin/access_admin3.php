<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script> -->
    <script src="../../JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
	
	<!-- JS -->
	<script type="text/javascript" src="../../assets/js/scriptAdmin.js?v1"></script>
    
	<title> Administrador2 </title>
    
</head>
<body onload="funcionTipo()">
<h1>Insertar tipos</h1>
<!-- Insertar tipos -->
<div>
		<form id="formularioT" method="Post">

			<label>Nombre: </label><br><input type="text" name="tip"  id="mi_tipoo" required=""><br>
			<label>Id: </label><br><input type="number" name="id" id="mi_id" required=""><br><br>

		<input type="submit" id="btnInsertar" name="boton" value="Insertar" onclick="return insertarTipo()"> 
		</form>
</div>


<!-- Mostrar tipos -->
<div id="tabla">
        <div id="tablaTipos2" ><b>[ La informacion de los tipos se mostrara aqui (Admin)]</b></div>
</div>
<button onclick="return funcionTipo()">Recargar</button>


</body>
</html>