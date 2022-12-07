<?php
require_once "config/conexion.php";

        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $apellido = $_POST['apellido'];
        $total =$_POST['total'];
        $productos = " ";


        $query = mysqli_query($conexion, "INSERT INTO pedidos( nombre, telefono, direccion,apellido,total,fecha) VALUES ('$nombre','$telefono','$direccion','$apellido',$total,now())");
        if ($query) {
        $query2 = mysqli_query($conexion, "UPDATE detalle SET id_cliente = '$telefono', fecha =now() WHERE estado = 'pendiente'");
        if($query2){
                $query3 = mysqli_query($conexion, "UPDATE detalle SET estado = 'confirmar'WHERE estado = 'pendiente'");
                        }
                }

                // $query = mysqli_query($conexion, "SELECT * FROM detalle WHERE id_cliente ='$telefono'");
                // while ($data = mysqli_fetch_assoc($query)) { 
                //         echo $data['producto'];
                // }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>

<script type="text/javascript">

        const telefono = "59169490709";
        const url = `https://api.whatsapp.com/send?phone=${telefono}&text=
          *_¡Hola!_ _TOJI_*%0A
          *Quisiera coordinar la siguiente del producto:*%0A
        <?php 
          $query = mysqli_query($conexion, "SELECT * FROM detalle WHERE id_cliente ='$telefono'");
        while ($data = mysqli_fetch_assoc($query)) { 
                echo '-',$data['producto'],'%0A';
        }?>
        %0A
          *Mi nombre es:* <?php echo $nombre; ?>  <?php echo $apellido; ?> %0A
          *Mi direccion es:* <?php echo $direccion; ?>%0A
        %0A
        Telefono de referencia: <?php echo $telefono; ?>%0A
        Cantidad a pagar: <?php echo $total; ?> bs. %0A`;

          window.open(url);
</script> 
<script type="text/javascript">

function redireccionarPagina() {
  window.location = "index.php";
}
setTimeout("redireccionarPagina()", 2000);
</script> 
</body>
</html>


