<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
	/* Aplicar estilos básicos para el input checkbox */
	.switch input[type="checkbox"] {
	display: none;
	}

	/* Estilos para el slider */
	.switch .slider {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	background-color: #ccc;
	border-radius: 34px;
	transition: background-color 0.3s;
	}

	/* Estilos para el indicador */
	.switch .slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	border-radius: 50%;
	transition: transform 0.3s;
	}

	/* Estilos para cambiar el color cuando está activo */
	.switch input[type="checkbox"]:checked + .slider {
	background-color: #ff3484;
	}

	/* Estilos para cambiar la posición del indicador */
	.switch input[type="checkbox"]:checked + .slider:before {
	transform: translateX(26px);
	}
	/*INICIA EL SEGUNDO SWITCH*/
	/* Aplicar estilos básicos para el input checkbox */
	.switch2 input[type="checkbox"] {
	display: none;
	}

	/* Estilos para el slider */
	.switch2 .slider2 {
	position: relative;
	display: inline-block;
	width: 60px;
	height: 34px;
	background-color: #ccc;
	border-radius: 34px;
	transition: background-color 0.3s;
	}

	/* Estilos para el indicador */
	.switch2 .slider2:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 4px;
	bottom: 4px;
	background-color: white;
	border-radius: 50%;
	transition: transform 0.3s;
	}

	/* Estilos para cambiar el color cuando está activo */
	.switch2 input[type="checkbox"]:checked + .slider2 {
	background-color: #ff3484;
	}

	/* Estilos para cambiar la posición del indicador */
	.switch2 input[type="checkbox"]:checked + .slider2:before {
	transform: translateX(26px);
	}

    strong {
	font-weight: bold; 
    }

    em {
	font-style: italic; 
    }

    
    </style>
</head>

<body>

<?php   
	require('../config.inc.php'); //This imports the connection to database
	require('../functions.php');

	//conexion
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
	$DB_NAME = DB_NAME;
	$DB_HOST = DB_HOST;

    $con = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    $usu = $_GET['usu'];

	$segusuario = '';
	if (isset($_SESSION['USER']['username'])) {
        $segusuario = $_SESSION['USER']['username'];
    }

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    if ($usu == 0){
		$sql = $con->prepare("SELECT * FROM users");
        $sql->execute();
  
    } else if ($usu == null){
		echo '';
		return;
	} else {
		$usu = $usu . '%';
		$sql = $con->prepare("SELECT * FROM users WHERE username LIKE :usu");
        $sql->bindParam(':usu', $usu);
        $sql->execute();  

    }                
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);   
	if(!$result){
        echo "<h5 align='center'>Not found</h5>"; 
        return;
    }             

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
    <thead>
        <tr>
            <th>Usuario</th>
			<th>Correo</th>
            <th>Fecha</th>   
            <th>Baneado</th>
			<th>Administrador</th>
			<th>Borrar</th>
        </tr>
        </thead>
        <tbody>";

        // Obtiene cada fila (arreglo) de resultados
        foreach($result as $ren) {       
			echo "<tr>";
			echo "<td><strong>" . $ren['username'] . "</strong></td>";
			echo "<td><strong>" . $ren['email'] . "</strong></td>";
			echo "<td><strong>" . $ren['date'] . "<strong></td>";
			echo "<td> <form method='Post'>
					<label class='switch'>
					<input type='checkbox' onclick='return banear(" . $ren['id'] . ")' " . ($ren['banned'] == 'true' ? 'checked' : '') . ">
					<span class='slider'></span>
					</label>
					</form> </td>";					
			echo "<td> <form method='Post'>
					<label class='switch2'>
					<input type='checkbox' onclick='return admin(" . $ren['id'] . ")' " . ($ren['admin'] == '1' ? 'checked' : '') . ">
					<span class='slider2'></span>
					</label>
					</form> </td>";    
			if ($ren['username'] != $segusuario) {
				echo "<td><form method='Post'> 
					<input type='image' width=30 height=30 src='../../assets/images/pages/admin/borrar.png' value='Borrar' onclick='return borrarUsuario(" . $ren['id'] . ")'>
				</form> </td>";  
			} else {
				echo "<td></td>";
			}    
			echo "</tr>";
		}
		
    echo "</tbody>
    </table>";

    $con = null;
?>
</body>
</html>