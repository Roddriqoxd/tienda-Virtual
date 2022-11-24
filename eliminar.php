<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'cli') {
            $query = mysqli_query($conexion, "DELETE FROM detalle WHERE id = $id");
            if ($query) {
                header('Location: lista.php');
            }
        }
        if ($_GET['accion'] == 'user') {
            $query = mysqli_query($conexion, "DELETE FROM usuarios WHERE id = $id");
            if ($query) {
                header('Location: usuario.php');
            }
        }
        if ($_GET['accion'] == 'vender') {
            $query = mysqli_query($conexion, "UPDATE formulario SET estado = '3' WHERE id = $id");
            if ($query) {
                header('Location: solicitudes.php');
            }
        }
    }
}
?>
