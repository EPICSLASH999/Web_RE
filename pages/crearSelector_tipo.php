<?php
    require('../config.inc.php'); //This imports the connection to database
 
     //conexion
    $DB_USER = DB_USER;
    $DB_PASS = DB_PASS;
    $DB_NAME = DB_NAME;
    $DB_HOST = DB_HOST;
    
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS);             

       if (!$con) {
           die('No se pudo conectar: ' . mysqli_error($con)); 
       }
   
       mysqli_select_db($con,'re_db');                
   
       $sql="SELECT id, nombreTipo FROM re4_tipos";   
       
       $result = mysqli_query($con,$sql);                     
   
       /*************  Genera la tabla respuesta ************************/
       echo "<form id='formularioT' method='post'>

                <div class='group'>
                    <label class='label'>Nombre: </label><input class='input'type='text' name='nom'  id='mi_nombre' required=''>
                </div>
                <div class='group'>
                <label class='label'>Descripcion: </label><input class='input' type='text' name='des'  id='mi_descripcion' required=''><br>
                </div>
                <div class='box' align='center'>
                <select  name='tipo' title='tipo' id='tipo'> ";
                    echo "<option> Selector Tipo:</option>";
                    // Obtiene cada dato del select
                    while($ren = mysqli_fetch_array($result)) {       
                        echo "<option value='" . $ren['id'] . "'>". $ren['nombreTipo']."</option>";
                    }
                echo "</select></div><br><br>";
        echo "<div class='group'>
            <input class='button' type='submit' name='boton' value='Insertar' onclick='insertarObjeto()'>
            </div>
            </form>";
                    
       mysqli_close($con);
?>

<style>    
  select {
    position: relative;
    width: 250px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #111;
    color: #fff;
    border: none;
    outline: none;
    font-size: 14px;
    padding: 10px 9px;
    margin: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    cursor: pointer;
    height: 38px;
  }

</style>