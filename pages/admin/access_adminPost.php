<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
	<script type="text/javascript" src="./js/scriptAdmin.js" type="application/javascript"></script>
    <script src="./js/scriptAdmin.js"> </script>
    <link rel="stylesheet" href="css/estiloPost.css">
	<title> Administrador </title>
    <link rel="stylesheet" type="text/css" href="css/scrollBar.css">
</head>

<!-- <body onload='funcionAdmin()'> -->
<body onload='funcionAdminPost()'> 


<center><h2>Administra Post!</h2>
	<img src="./img/icon.png" height="250" width="350">
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
	<!-- AQUI COMIENZA LA TABLA DE USUARIOS NORMAL -->
    <!-- <div id="tabla"> 
        <div id="tablaUsuarios" ><b>[ La informacion de la persona se mostrara aqui (Admin)]</b></div>
    </div> -->
<div id="tablaP">
        <div id="tablaPost" ><b>[ La informacion de los 'Posts' se debera mostrar aqui ]</b></div>
</div>
</center>
<input class="prueba" type="button" name="botonConsulta" id="btnRecargar" onclick="return funcionAdminPost()"> 
<br>
<br>
</body>
</html>