<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['telefono']) && !empty($_GET['pedido'])&& !empty($_GET['cantidad'])) {
        require_once "../config/conexion.php";
        $pedido =$_GET['pedido'];
        $telefono = $_GET['telefono'];
        $cantidad = $_GET['cantidad'];
        if ($_GET['accion'] == 'update') {
            $query = mysqli_query($conexion, "UPDATE detalle SET estado = 'vendido' WHERE id_cliente = $telefono");
            $query2 = mysqli_query($conexion, "UPDATE productos SET cantidad = cantidad-$cantidad WHERE id = $pedido");
            if ($query) {
                
                header('Location: solicitudes.php');
            }
        }
    }
}
?>
