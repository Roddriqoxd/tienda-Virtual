<?php require_once "config/conexion.php"; ?>
<?php include("cabeza.php");?>

<br><br>
<div class="container">

<h1 class="text-center fw-bolder">FORMULARIO DE ENTREGAS</h1>

<!-- ejemplo -->

<form action="enviar.php" method="POST" class="form">

<div class="container mb-3 row">
<div class="col-12">
    <h5  class="form-label fw-bolder">Datos del Producto</h5>
        <div class="row">
            <div class="col 12">
                <label  class="form-label fw-bolder">Producto</label>
  <?php
                    $query = mysqli_query($conexion, "SELECT * FROM detalle Where estado ='pendiente'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
<h6><?php echo $data['producto']; ?></h6><hr>
                    <?php } ?>
            </div>
            <div class="col 12 text-center">
                <label for="basic-url" class="form-label fw-bolder ">Precio</label>
                <?php
                    $query = mysqli_query($conexion, "SELECT * FROM detalle Where estado ='pendiente'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
<h6><?php echo $data['precio']; ?></h6><hr>
                    <?php } ?>
            </div>
        </div>
        <br>
            <div class="col 12 text-center">
                <label for="basic-url" class="form-label ">Total a pagar Bs.</label>
                <input class="form-control text-center" name="total" id="total" placeholder="" readonly value="
                <?php
                      $query2 = mysqli_query($conexion, "SELECT SUM(precio) FROM detalle where estado ='pendiente'");
                      while ($data2 = mysqli_fetch_assoc($query2)) { 
                        echo $data2['SUM(precio)'];
                          } ?>"/>
            </div>
        </div>
        <h5 for="basic-url" class="form-label fw-bolder">Datos del cliente</h5>
<div class="row">
<div class="mb-3 col-6">
  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input  class="form-control" name="nombre" id="nombre" placeholder="" required />
</div>
<div class="col-6">
    <label for="basic-url" class="form-label">Apellido</label>
    <input  class="form-control" id="apellido" name="apellido"  />
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">WhatsApp / telefono</label>
  <input class="form-control" type="text" name="telefono"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'required />
</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" required>Direccion</label>
  <textarea class="form-control" name="direccion" id="direccion" placeholder="Calle porvenir entre Granado #521 Sacaba" rows="3"></textarea>
</div>     
<button class=" btn btn-success">Enviar </button>
</div>
<div id="respuesta"></div>
</div>
    </form>
</div><br><br><br>
<script src="enviar.js"></script>
<footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ITSA 2022</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="assets/js/scripts.js"></script> -->
    
    
</body>
</html>