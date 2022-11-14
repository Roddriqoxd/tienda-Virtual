<?php
require_once "config/conexion.php";
        $producto = $_POST['producto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $apellido = $_POST['apellido'];
        $cantidad = $_POST['cantidad'];
        $total =$_POST['total'];
        $query = mysqli_query($conexion, "INSERT INTO pedidos(producto, nombre, telefono, direccion,apellido,cantidad,estado,total,fecha) VALUES ('$producto','$nombre','$telefono','$direccion','$apellido','$cantidad','pendiente',$total,now())");
        if ($query) {
        header('Location: enviado.php');
        }
        ?>

