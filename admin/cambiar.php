<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])&& !empty($_GET['id2'])&& !empty($_GET['id3'])) {
        require_once "../config/conexion.php";
        $id = $_GET['id'];
        $id2 = $_GET['id2'];
        $id3 = $_GET['id3'];
        if ($_GET['accion'] == 'vender') {
            // $query = mysqli_query($conexion, "UPDATE productos SET cantidad = cantidad - $id3 WHERE id = $id ");
            $query = mysqli_query($conexion, "UPDATE pedidos SET estado = 'vendido' WHERE id = $id2");
            if ($query) {
                header('Location: solicitudes.php');
            }
        }
    }
}
?>
