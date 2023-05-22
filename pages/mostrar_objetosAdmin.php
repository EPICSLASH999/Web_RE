<?php   
    //conexion
    $DB_USER = 'master';
    $DB_PASS = '1234';

    $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);

    $obj = $_GET['obj'];

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    if ($obj == 0){
        $sql = $con->prepare("SELECT re4_objetos.id,re4_objetos.nombre,re4_objetos.descripcion,re4_tipos.nombreTipo FROM
        re4_objetos,re4_tipos
        WHERE
        re4_objetos.tipo = re4_tipos.id");
        $sql->execute();

    } else {
        $sql = $con->prepare("SELECT re4_objetos.id, re4_objetos.nombre,re4_objetos.descripcion,re4_tipos.nombreTipo FROM
        re4_objetos,re4_tipos
        WHERE
        re4_objetos.tipo = re4_tipos.id AND nombre= :obj");
        $sql->bindParam(':obj', $obj);
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
            <th>Nombre</th>
			<th>Descripcion</th>
            <th>Tipo</th>   
			<th>Borrar</th>
        </tr>
        </thead>
        <tbody>";

        // Obtiene cada fila (arreglo) de resultados
        foreach($result as $ren) {       
			echo "<tr>";
			echo "<td><strong>" . $ren['nombre'] . "</strong></td>";
			echo "<td><strong>" . $ren['descripcion'] . "</strong></td>";
			echo "<td><strong>" . $ren['nombreTipo'] . "<strong></td>";			
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