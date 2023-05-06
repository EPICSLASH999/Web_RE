<?php
    include("config.inc.php"); // Imports conexion to database

        
    $DB_USER="master";
    $DB_PASS="1234";

    //make a database connection

    // NACHO WAS HERE
    $con = new PDO('mysql:host=localhost;dbname=re_db', $DB_USER, $DB_PASS);
    if(!$con)
    {
        echo "Connection Failed" . mysqli_connect_error();
        //die("Could not connect to database");
    }


    if(isset($_POST['input'])){
        $input = $_POST['input'];
        //$table_name = "re4_objetos";

        //$query = "SELECT * FROM {$table_name} WHERE nombre LIKE '{$input}%' LIMIT 4"; // Limit of rows per search
        //$query = "SELECT * FROM {$table_name} WHERE nombre LIKE '{$input}%' OR telefono LIKE '{$input}%' OR correo LIKE '{$input}%' LIMIT 3";
        
        //Preparar la consulta
        $sql = $con->prepare("SELECT re4_objetos.nombre,re4_objetos.descripcion,re4_tipos.nombreTipo
        FROM
        re4_objetos,re4_tipos
        WHERE
        re4_objetos.tipo = re4_tipos.id
        AND
        re4_objetos.nombre LIKE :input LIMIT 4");

        $inputParam = $input . '%';
        
        
        //Colocar los parametros
        $sql->bindParam(':input', $inputParam, PDO::PARAM_STR, 30);

        $sql->execute();
        
        if(!$sql){
            echo 'Error al ejecutar la consulta';
        }

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if($sql->rowCount() > 0){?>
            <table>
                <thread>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                    </tr>
                </thread>

                <tbody>
                    <?php

                    foreach ($result as $ren){
                        $nombre = $ren['nombre'];
                        $descripcion = $ren['descripcion'];
                        $tipo = $ren['nombreTipo'];

                        ?>

                        <tr>
                            <td><?php echo $nombre;?></td>
                            <td><?php echo $descripcion;?></td>
                            <td><?php echo $tipo;?></td>
                        </tr>

                        <?php
                    }

                    ?>
                </tbody>

            </table>

            <?php
        } else{
            echo "<h6>No data found</h6>";
        }
    }
?>