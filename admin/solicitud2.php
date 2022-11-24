<?php
require_once "../config/conexion.php";

include("includes/header.php"); ?>

    <h1 class="h3 mb-0 text-gray-800">Selecione la fecha inicio y fecha fin para filtrar los reportes que desea</h1>

    <div class="container">
            <div class="row">
              <div class="col-md-12 text-center mt-5">
                <form action="filtro2.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <input type="date" name="f_ingreso" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <input type="date" name="f_fin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success mb-2">Filtrar Reporte</button>
                    </div>
                  </div>
                </form>
              </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                <tr>
                        <th>#</th>
                        <th>producto</th>
                        <th>precio</th>
                        <th>Fecha</th>
                        <th>Id cliente</th>
                        <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $i =1;
                    $query = mysqli_query($conexion, "SELECT * FROM detalle where estado ='vendido'");
                    
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                <td><?php echo $i++; ?></td>
                
                            <td><?php echo $data['producto']; ?></td>
                            <td><?php echo $data['precio']; ?></td>
                            <td><?php echo $data['fecha']; ?></td>
                            <td><?php echo $data['id_cliente']; ?></td>
                            <td><?php echo $data['estado']; ?></td>
            </tr>
                    <?php } ?>
                    <?php
                    $query2 = mysqli_query($conexion, "SELECT SUM(precio) FROM detalle where estado ='vendido' ");
                    while ($data = mysqli_fetch_assoc($query2)) { ?>
                        <td>Total de ventas: </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $data['SUM(precio)']; ?></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>