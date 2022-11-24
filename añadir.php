<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])&& !empty($_GET['nombre'])&& !empty($_GET['precio']) ) {
        require_once "config/conexion.php";
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $precio = $_GET['precio'];
        if ($_GET['accion'] == 'cli') {
            $query = mysqli_query($conexion, "INSERT INTO detalle (`producto`, `id_producto`, `estado`, cantidad, `precio`) VALUES ('$nombre','$id','pendiente','1','$precio')");
            if ($query) {
                header('Location: index.php');
            }
        }
    }
}
?>