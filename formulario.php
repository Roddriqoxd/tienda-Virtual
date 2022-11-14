<?php require_once "config/conexion.php"; ?>
<?php include("cabeza.php");?>
<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'form') {
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
            }
        }
    }
?>
<?php
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
<br><br>
<div class="container">

<h1 class="text-center fw-bolder">FORMULARIO DE ENTREGAS</h1>

<!-- ejemplo -->

<form action="enviar.php" method="POST" class="form">

<div class="mb-3 row">
<div class="col-6">
    <h5  class="form-label fw-bolder">Datos del Producto</h5>
        <div class="row">
            <div class="col 6">
                <label  class="form-label">Producto</label>
                <input type="text" readonly class="form-control-plaintext" name="producto" id="producto" value="<?php echo $data['nombre'] ?>"/>
            </div>
            <div class="col 6 text-center">
                <label for="basic-url" class="form-label ">Precio</label>
                <input creadonly class="form-control-plaintext text-center" type="text" id="numero2" name="" value="<?php echo $data['precio_rebajado'] ?> "oninput="cal()"/>
            </div>
            
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col 6">
                <label for="basic-url" class="form-label">Cantidad</label>
                <input class="form-control" type="number" id="numero" name="cantidad" min="1" max="<?php echo $data['cantidad'] ?>" placeholder="1-<?php echo $data['cantidad'] ?> "oninput="cal()" required/>
            </div>

            <div class="col 6 text-center">
                <label for="basic-url" class="form-label ">Total a pagar Bs.</label>
                <input readonly class="form-control-plaintext text-center fw-bolder" name="total" id="nuevoSaldo" placeholder="" />
            </div>
        </div>
<script type="text/javascript">
    function cal() {
    try {
    var a = parseInt(document.getElementById("numero").value) || 0,
        b = parseInt(document.getElementById("numero2").value) || 0;

    document.getElementById("nuevoSaldo").value = a * b;
        } catch (e) {}
    }
</script>
</div>     

<div class="col-6" style="   display: flex; align-items: center; justify-content: center;">
        <img id="imgen" class="d-block w-50" src="assets/img/<?php echo $data['imagen']; ?>" />
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
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">WhatsApp / telefono</label>
  <input class="form-control" type="text" name="telefono" id="tel"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'required />
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" required>Direccion</label>
  <textarea class="form-control" name="direccion" id="direccion" rows="3"></textarea>
<div id="respuesta"></div>
</div>

    <button class="btn-success">Enviar </button>
      <!-- <button id="enviar" class="btn-success">Enviar a WhatsApp</button> -->
      <button type="button" class="btn btn-success" id="enviar">Enviar por WhapsApp</button>
    </form>
</div><br><br><br>
    <?php  } } ?>
<!-- ejemplo -->
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