<?php
       $con = mysqli_connect('localhost','master','1234');                 

       if (!$con) {
           die('No se pudo conectar: ' . mysqli_error($con)); 
       }
   
       mysqli_select_db($con,'re_db');                
   
       $sql="SELECT id, nombreTipo FROM re4_tipos";   
       
       $result = mysqli_query($con,$sql);                     
   
       /*************  Genera la tabla respuesta ************************/
       echo "<form id='formularioT' method='post'>
                <label>Nombre: </label><br><input type='text' name='nom'  id='mi_nombre' required=''><br>
                <label>Descripcion: </label><br><input type='text' name='des'  id='mi_descripcion' required=''><br><br>
                <select name='tipo' title='tipo' id='tipo'> ";
                    echo "<option> Selector Tipo:</option>";
                    // Obtiene cada dato del select
                    while($ren = mysqli_fetch_array($result)) {       
                        echo "<option value='" . $ren['id'] . "'>". $ren['nombreTipo']."</option>";
                    }
                echo "</select><br><br>";
        echo "<input type='submit' name='boton' value='Insertar' onclick='insertarObjeto()'>
        </form>";
                    
       mysqli_close($con);
?>

