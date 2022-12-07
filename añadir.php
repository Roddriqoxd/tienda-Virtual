<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])&& !empty($_GET['nombre'])&& !empty($_GET['precio']) ) {
        require_once "config/conexion.php";
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $precio = $_GET['precio'];
        if ($_GET['accion'] == 'cli') {
            $validar = "SELECT * FROM detalle WHERE id_producto = '$id' AND estado = 'pendiente'";
            $validado=($conexion ->query($validar));
            if(mysqli_num_rows($validado)>0){
                $sumar = mysqli_query($conexion , "UPDATE detalle SET cantidad = cantidad + '1' , precio = $precio * cantidad WHERE id_producto = '$id' AND estado = 'pendiente'");
                header('Location: index.php');
            }else{
                $query = "INSERT INTO detalle (`producto`, `id_producto`, `estado`, cantidad, `precio`) VALUES ('$nombre','$id','pendiente','1','$precio')";
                $enviar = ($conexion->query($query));
                header('Location: index.php');
            }           
            // if ($query||$sumar) {
            //     header('Location: index.php');
            // }
        }
    }
}
?>