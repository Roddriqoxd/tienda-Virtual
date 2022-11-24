<?php 
ob_start();
require_once "../config/conexion.php";
sleep(1);

$fechaInit = date("Y-m-d", strtotime($_GET['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_GET['f_fin']));
$producto = $_GET['producto'];
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


<?php


$sqlSolicitudes = ("SELECT * FROM  detalle WHERE `fecha` BETWEEN '$fechaInit' AND '$fechaFin'AND id_producto='$producto' and estado ='vendido'");
$query = mysqli_query($conexion, $sqlSolicitudes);
$total = mysqli_num_rows($query); 
?>

<h2 class="h3 mb-0 text-gray-800">Reporte de todos los productos <br>
<?php echo $fechaInit; ?>     a      <?php echo $fechaFin; ?></h2><br>
<?php echo '<strong>Total: </strong> ('. $total .')';?>
<table class="table table-hover">
    <thead>
        <tr>
                        <th>#</th>
                        <th>producto</th>
                        <th>precio</th>
                        <th>Fecha</th>
                        <th>Id cliente</th>
                        <th>Estado</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                
                            <td><?php echo $dataRow['producto']; ?></td>
                            <td><?php echo $dataRow['precio']; ?></td>
                            <td><?php echo $dataRow['fecha']; ?></td>
                            <td><?php echo $dataRow['id_cliente']; ?></td>
                            <td><?php echo $dataRow['estado']; ?></td>
            </tr>
        </tbody>
    <?php } ?>
    <?php
                    $query2 = mysqli_query($conexion, "SELECT SUM(precio) FROM  detalle WHERE `fecha` BETWEEN '$fechaInit' AND '$fechaFin'AND id_producto='$producto' and estado ='vendido'");
                    while ($data = mysqli_fetch_assoc($query2)) { ?>
                        <td>Total de ventas: </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $data['SUM(precio)']; ?></td>
                        <?php } ?>
</table>
    
</body>
</html>
<?php
$html=ob_get_clean();
//echo $html;

require_once 'libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf =new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);

$dompdf->loadHtml("$html");

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream('archivo_pdf',array("Attachhment"=>false));
?>