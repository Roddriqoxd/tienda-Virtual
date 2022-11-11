<?php 
ob_start();
require_once "../config/conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<br>
<br>
    <h1 class="h3 mb-0 text-gray-800 text-center">Reporte de ventas por fecha</h1>
    <div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover" style="width: 100%;">
                <thead class="thead">
                    <tr>
                        <th>Nombre</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = mysqli_query($conexion, "SELECT * FROM formulario where estado ='2' ");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['producto']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                        </tr>
                        <?php } ?>
                        <br><br><br>
                        
                        <?php
                    $query2 = mysqli_query($conexion, "SELECT SUM(total) FROM formulario where estado ='2' ");
                    while ($data2 = mysqli_fetch_assoc($query2)) { ?>
                        <td>Total de ventas: </td>
                        <td><?php echo $data2['SUM(total)']; ?></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
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