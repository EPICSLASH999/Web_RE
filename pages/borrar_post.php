<?php
$con = mysqli_connect('localhost', 'master', '1234');
$id = $_POST['id'];

if (!$con) {
    die('No se pudo conectar: ' . mysqli_error($con));
}

mysqli_select_db($con, 're_db');
$victima = "SELECT parent_id FROM posts WHERE id = '$id'";
$asesinato = mysqli_query($con, $victima);
$sql = "DELETE FROM posts WHERE id='" . $id . "'";
$result = mysqli_query($con, $sql);

if ($asesinato) {
    $row = mysqli_fetch_assoc($asesinato);
    $parent_id = $row['parent_id'];

    $query = "SELECT COUNT(*) AS num FROM posts WHERE parent_id = '$parent_id'";
    $res = mysqli_query($con, $query);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $num = $row['num'];
        mysqli_query($con, "UPDATE posts SET comments = '".$num."' WHERE id = '$parent_id'");

    } else {
        echo "Error al obtener el recuento de registros: " . mysqli_error($con);
    }
} 




if ($result) {
    $sql2 = "SELECT * FROM posts WHERE parent_id='" . $id . "'";
    $result2 = mysqli_query($con, $sql2);

    if ($result2) {
        if (mysqli_num_rows($result2) > 0) {
            $coments = "DELETE FROM posts WHERE parent_id='" . $id . "'";
            $resultc = mysqli_query($con, $coments);

            if (!$resultc) {
                echo "Error al eliminar los comentarios: " . mysqli_error($con);
            }
        }
    } else {
        echo "Error al obtener los comentarios: " . mysqli_error($con);
    }

    echo "Eliminación realizada con éxito";
} else {
    echo "Error al eliminar los registros: " . mysqli_error($con);
}

mysqli_close($con);
?>