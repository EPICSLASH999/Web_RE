<?php   
    require('../config.inc.php'); //This imports the connection to database
 
     //conexion
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
    $DB_NAME = DB_NAME;
    $DB_HOST = DB_HOST;
    
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS);

    $tip = $_GET['tip'];

    if (!$con) {
        die('No se pudo conectar: ' . mysqli_error($con));              
    }
    mysqli_select_db($con,'re_db');
    if ($tip == null){
        $sql="SELECT * FROM re4_tipos";   
    } else {
        $sql="SELECT * FROM re4_tipos WHERE nombreTipo='".$tip."'";   
    }                
    $result = mysqli_query($con,$sql);                     

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
    <thead>
        <tr>
            <th>Id</th>
			<th>Tipo</th>
        </tr>
        </thead>
        <tbody>";

        // Obtiene cada fila (arreglo) de resultados
        while($ren = mysqli_fetch_array($result)) {       
			echo "<tr>";
			echo "<td><strong>" . $ren['id'] . "</strong></td>";
			echo "<td><strong>" . $ren['nombreTipo'] . "</strong></td>";		
			echo "<td><form method='Post'> 
					<input type='image' width=30 height=30 src='../../assets/images/pages/admin/borrar.png' value='Borrar' onclick='return borrarTipo(" . $ren['id'] . ")'>
				</form> </td>";     
			echo "</tr>";
		}
    echo "</tbody>
    </table>";

    mysqli_close($con);
?>
</body>
</html>