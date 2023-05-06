<?php
    include("config.php"); // Imports conexion to database

    if(isset($_POST['input'])){
        $input = $_POST['input'];
        //$table_name = "re4_objetos";

        //$query = "SELECT * FROM {$table_name} WHERE nombre LIKE '{$input}%' LIMIT 4"; // Limit of rows per search
        //$query = "SELECT * FROM {$table_name} WHERE nombre LIKE '{$input}%' OR telefono LIKE '{$input}%' OR correo LIKE '{$input}%' LIMIT 3";
        $query = 
        "SELECT re4_objetos.nombre,re4_objetos.descripcion,re4_tipos.nombreTipo
        FROM
        re4_objetos,re4_tipos
        WHERE
        re4_objetos.tipo = re4_tipos.id
        AND
        re4_objetos.nombre LIKE '{$input}%' LIMIT 4";


        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) > 0){?>
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

                    while($row = mysqli_fetch_assoc($result)){
                        $nombre = $row['nombre'];
                        $descripcion = $row['descripcion'];
                        $tipo = $row['nombreTipo'];

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