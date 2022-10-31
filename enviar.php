<?php
require_once "config/conexion.php";
        $producto = $_POST['producto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $color = $_POST['color'];
        $cantidad = $_POST['cantidad'];
        $id = $_POST['id'];
        // $estado =$_POST['estado'];
        $query = mysqli_query($conexion, "INSERT INTO formulario(producto, nombre, telefono, direccion,color,cantidad,id_producto,estado) VALUES ('$producto','$nombre','$telefono','$direccion','$color','$cantidad',$id,'1')");
        if ($query) {
        header('Location: enviado.php');
        }
        ?>

