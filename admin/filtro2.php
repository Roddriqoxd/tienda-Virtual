<?php
sleep(1);
include("includes/header.php"); 
include('../config/conexion.php');

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlSolicitudes = ("SELECT * FROM  detalle WHERE `fecha` BETWEEN '$fechaInit' AND '$fechaFin' and estado ='vendido'");
$query = mysqli_query($conexion, $sqlSolicitudes);
$total = mysqli_num_rows($query); ?>
<h1 class="h3 mb-0 text-gray-800">Reportes filtrados de todos los productos <br><?php echo $fechaInit; ?>     a      <?php echo $fechaFin; ?></h1><br>
<?php echo '<strong>Total: </strong> ('. $total .')'; ?>
        <form method="Post" action="impri2.php?f_ingreso=<?php echo $fechaInit ?>&f_fin=<?php echo $fechaFin ?>">
            <button class="btn btn-danger" type="submit">IMPRIMIR REPORTE EN PDF</button>
        </form>
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
                    $query2 = mysqli_query($conexion, "SELECT SUM(precio) FROM  detalle WHERE `fecha` BETWEEN '$fechaInit' AND '$fechaFin'AND  estado ='vendido'");
                    while ($data = mysqli_fetch_assoc($query2)) { ?>
                        <td>Total de ventas: </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $data['SUM(precio)']; ?></td>
                        <?php } ?>
</table>
<?php include("includes/footer.php"); ?>