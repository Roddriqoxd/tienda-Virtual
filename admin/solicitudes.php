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
                        
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Color</th>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM formulario ORDER BY id DESC");
                    
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['telefono']; ?></td>
                            <td><?php echo $data['direccion']; ?></td>
                            <td><?php echo $data['color']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                            <td><?php echo $data['id_producto']; ?></td>
                            <td>
                                <?php
switch ($data['estado']) {
    case '1':
        echo "Pendiente";
        break;
        case '2':
            echo "Entregado";
            break;
            case '3':
                echo "Rechazado";
                break;
    }?></td>
                            <td>
                                <form method="post" action="cambiar.php?accion=vender&id=<?php echo $data['id_producto']; ?>&id2=<?php echo $data['id']; ?>&id3=<?php echo $data['cantidad']; ?>" class="d-inline">
                                    <button class="btn btn-success" type="submit">✓</button>
                                </form>
                                <form method="post" action="eliminar.php?accion=vender&id=<?php echo $data['id']; ?>" class="d-inline">
                                    <button class="btn btn-danger" type="submit">✗</button>
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