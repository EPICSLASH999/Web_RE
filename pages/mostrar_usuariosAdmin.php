<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Usuarios</title>
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
	background-color: #2196F3;
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
	background-color: #D02525;
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

    table {
	background: #211F1F;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 800px;
    }	
th {
	background: linear-gradient(#777, #777);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}
th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}
td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}
td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}
tr:nth-child(odd) td {
	background: #856868;	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	


tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #DFDFD6;
}
    </style>
</head>

<body>

<?php   
	//conexion
    $DB_USER = 'master';
    $DB_PASS = '1234';

    $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);
    $usu = $_GET['usu'];

	session_start(); 
    if (isset($_SESSION['USER']['username'])) {
        $segusuario = $_SESSION['USER']['username'];
    }

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    if ($usu == null){
		$sql = $con->prepare("SELECT * FROM users");
        $sql->execute();
  
    } else {
		$sql = $con->prepare("SELECT * FROM users WHERE username= :usu");
        $sql->bindParam(':usu', $usu);
        $sql->execute();  

    }                
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);                

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