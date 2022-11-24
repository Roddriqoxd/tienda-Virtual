<?php
require_once "../config/conexion.php";
include("includes/header.php");
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Solicitudes</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>total</th>
                        <th>Producto(s)</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['apellido']; ?></td>
                            <td><?php echo $data['telefono']; ?></td>
                            <td><?php echo $data['direccion']; ?></td>
                            <td><?php echo $data['fecha']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                            <td>
                            <?php
                    $phone = $data['telefono']; 
                    $query2 = mysqli_query($conexion, "SELECT * FROM detalle where id_cliente = '$phone'");
                    while ($data2 = mysqli_fetch_assoc($query2)) { ?>
                    <?php echo $data2['producto']; ?><br>
                    <?php } ?>
                            </td>
                            <td>
                            <?php
                    $phone = $data['telefono']; 
                    $query2 = mysqli_query($conexion, "SELECT * FROM detalle where id_cliente = '$phone'");
                    while ($data2 = mysqli_fetch_assoc($query2)) { ?>
                    <?php echo $data2['estado']; ?><br>
                    <?php break;} ?>
                            </td>
                            <td>
                            <form method="POST" action="elimi.php?accion=update&telefono=<?= $data['telefono']?>&pedido=<?= $data2['id_producto']?>" class="d-inline">
                                    <button class="btn btn-success" type="submit">✔</button>
                                    <!-- <td><?php echo $data['telefono']; ?></td> -->
                                </form>
                                </td>
                                
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>