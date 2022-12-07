<?php require_once "config/conexion.php"; ?>
<?php include("cabeza.php");?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php
                    $query = mysqli_query($conexion, "SELECT * FROM detalle Where estado ='pendiente'");
                    while ($data = mysqli_fetch_assoc($query)) {?>
                        <tr>
                            <td><?php echo $data['id_producto']; ?></td>
                            <td><?php echo $data['producto']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                            <td><?php echo $data['precio']; ?></td>
                            <td>
                                <form method="post" action="eliminar.php?accion=cli&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr class="fw-bolder">
                            <td></td>
                            <td></td>
                            <td> TOTAL: </td>
                            <td>
                            <?php
                      $query2 = mysqli_query($conexion, "SELECT SUM(precio) FROM detalle where estado ='pendiente'");
                      while ($data2 = mysqli_fetch_assoc($query2)) { 
                        echo $data2['SUM(precio)'];
                          } ?>
                            </td>
                            <td></td>
                        </tr>
  </tbody>

</table>
</div>
<div class="container">
<a href="form.php" class="btn btn-success"> REALIZAR LA ENTREGA A DOMICILIO</a>
</div>

</section>
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>