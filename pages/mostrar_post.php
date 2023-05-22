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

strong {
	font-weight: bold; 
    }

    em {
	font-style: italic; 
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
	require('../config.inc.php'); //This imports the connection to database
    
    //conexion
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
    $DB_NAME = DB_NAME;
    $DB_HOST = DB_HOST;
    
    $con = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
              
    $pub = $_GET['pub'];

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }

    if ($pub == 0){
		$sql = $con->prepare("SELECT * FROM posts ORDER BY date DESC LIMIT 5");
        $sql->execute();
        
    } else if ($pub == null){
		echo '';
		return;
	}else{
		$pub = $pub . '%';
        $sql = $con->prepare("SELECT * FROM posts WHERE post LIKE :pub");
        $sql->bindParam(':pub', $pub);
        $sql->execute();  
		

    }                
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);   
	if(!$result){
        echo "<h5 align='center'>Not found</h5>"; 
		$con = null;
        return;
    }                   

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
    <thead>
        <tr>
            <th>No. de publicación</th>
			<th>No. de usuario</th>
            <th>Post</th>   
            <th>Date</th>
            <th>Raiz</th>
			<th>Borrar</th>
        </tr>
        </thead>
        <tbody>";

        // Obtiene cada fila (arreglo) de resultados
        foreach($result as $ren) {       
			echo "<tr>";
			echo "<td><strong>" . $ren['id'] . "</strong></td>";
			echo "<td><strong>" . $ren['user_id'] . "</strong></td>";
			echo "<td><strong>" . $ren['post'] . "</strong></td>";
            echo "<td><strong>" . $ren['date'] . "</strong></td>";
            echo "<td><strong>" . $ren['parent_id'] . "</strong></td>";
			echo "<td><form method='Post'> 
					<input type='image' width=30 height=30 src='../../assets/images/pages/admin/borrar.png' value='Borrar' onclick='return borrarPost(" . $ren['id'] . ")'>
				</form> </td>";     
			echo "</tr>";
		}
		
    echo "</tbody>
    </table>";

    $con = null;
?>
</body>
</html>
