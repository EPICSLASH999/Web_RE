<?php
	require('../../config.inc.php'); //This imports the connection to database
	require('../../functions.php');

	if ($_SESSION['USER']['admin'] != 1) {
		header("Location: index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    </head>
    <body>
        <center>
            <div id="cuadro2">
                <h1> Obtener Cifrado Hash </h1>
                <form id="formularioC" method="Post">
                    Palabra: <input type="text" name="val" id="val"> 
                    <input type="submit" name="botonConsulta" id="btnBuscar"  value="Cifrar">
                    <br>
                    <div id="tabla2">
                        <div id="tablaUsuarios2" ></div> <br>
                    </div>
                    <br>
                </form>
            </div>

            <?php
                if (!empty($_POST) && $_POST['val'] != ''){
                    $valor = $_POST['val'];
                    echo $valor;
                    echo "<br>";
                    $password = password_hash($valor, PASSWORD_DEFAULT);
                    echo $password;
                }
                    
            ?>
        </center>
    
    </body>
</html>