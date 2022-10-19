<?php
require_once "config/conexion.php";
        $producto = $_POST['producto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $color = $_POST['color'];
        $cantidad = $_POST['cantidad'];
        $id = $_POST['id'];
        $query = mysqli_query($conexion, "INSERT INTO formulario(producto, nombre, telefono, direccion,color,cantidad,id_producto) VALUES ('$producto','$nombre','$telefono','$direccion','$color','$cantidad',$id)");
        if ($query) {
        header('Location: index.php');
        }
        ?>