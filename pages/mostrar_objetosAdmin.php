<?php   
    //conexion
    $DB_USER = 'master';
    $DB_PASS = '1234';

    $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);

    $obj = $_GET['obj'];

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    if ($obj == null){

        $sql = $con->prepare("SELECT * FROM re4_objetos");
        $sql->execute();

    } else {
        $sql = $con->prepare("SELECT * FROM re4_objetos WHERE nombre= :obj");
        $sql->bindParam(':obj', $obj);
        $sql->execute();  
    }                

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);               

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
    <thead>
        <tr>
            <th>Nombre</th>
			<th>Descripcion</th>
            <th>tipo</th>   
			<th>Borrar</th>
        </tr>
        </thead>
        <tbody>";

        // Obtiene cada fila (arreglo) de resultados
        foreach($result as $ren) {       
			echo "<tr>";
			echo "<td><strong>" . $ren['nombre'] . "</strong></td>";
			echo "<td><strong>" . $ren['descripcion'] . "</strong></td>";
			echo "<td><strong>" . $ren['tipo'] . "<strong></td>";			
			echo "<td><form method='Post'> 
					<input type='image' width=30 height=30 src='../../assets/images/pages/admin/borrar.png' value='Borrar' onclick='return borrarObjeto(" . $ren['id'] . ")'>
				</form> </td>";     
			echo "</tr>";
		}
    echo "</tbody>
    </table>";

    $con = null;
?>
</body>
</html>