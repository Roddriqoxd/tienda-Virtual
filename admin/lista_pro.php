<?php
require_once "../config/conexion.php";
if (isset($_POST)) {
    if (!empty($_POST)) {
        $year = $_POST['year'];
        $month = $_POST['month'];
        $query =  mysqli_query($conexion, "SELECT * FROM formulario WHERE MONTH(fecha) = '$month' AND YEAR(fecha) = '$year'");
        if($query){
            header('Location: pdf_reportes.php');
        }
    }
}
include("includes/header.php");
?>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i>Filtrar</a>
    <a href="pdf_reportes.php" class="btn btn-danger" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i>imprimir</a> -->
<br>
<br>
    <h1 class="h3 mb-0 text-gray-800 text-center">Productos por agotarse</h1>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover" style="width: 100%;">
                <thead class="thead">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = mysqli_query($conexion, "SELECT * FROM productos where cantidad <'10'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                        </tr>
                        <?php } ?>
                        <hr>
                        <!-- <td>Total de ventas: </td>
                        <td></td>
                        <td></td>
                        <td>xxx</td> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="categorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="title">Fecha</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Año</label>
                        <input id="nombre" class="form-control" type="text" name="year" placeholder="Ejemplo: 2022" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Mes</label>
                        <input id="nombre" class="form-control" type="text" name="month" placeholder="Ejemplo: 01" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>