<?php require_once "config/conexion.php"; ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toji online store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.png"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<body>
<div class="bg-dark">
    <nav id="navar" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- <a class="navbar-brand" type="button" href="#">Inicio</a> -->
                <img src="assets/img/logo.png" alt="" width="30" height="30">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav " >
                    <a href="index.php" class="nav-link" style="color: white;">TOJI ONLINE STORE</a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<?php
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
<br><br><br>  
<div class="container" style="">
<h1 class="text-center">FORMULARIO DE ENTREGAS</h1>
<form action="enviar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="mb-3">
</div>
<div class="mb-3 row">
<div class="col-6">
<label for="basic-url" class="form-label fw-bolder">Datos del Producto</label>
<div class="row">
    <div class="col 6">
    <label for="basic-url" class="form-label">Producto</label>
    <!-- <input  class="form-control" id="floatingInputValue" name="producto" placeholder="" value="<?php echo $data['nombre'] ?>"> -->
    <input type="text" readonly class="form-control-plaintext" name="producto" value="<?php echo $data['nombre'] ?>">
</div>

    <div class="col 6">
    <label for="basic-url" class="form-label">#CodigoProducto</label>
    <!-- <input  class="form-control" id="floatingInputValue" name="id" placeholder="" value="<?php echo $data['id'] ?>"> -->
    <input type="text" readonly class="form-control-plaintext" name="id" value="<?php echo $data['id'] ?>">
    </div>
</div>
<div class="row">
    <div class="col 6">
    <label for="basic-url" class="form-label">Cantidad</label>
<input class="form-control" type="number" id="floatingInputValue" name="<?php echo $num='' ?>" value="" placeholder="1-<?php echo $data['cantidad'] ?>">
</div>
    <div class="col 6">
    <label for="basic-url" class="form-label">Precio</label>
    <input  class="form-control" id="floatingInputValue" name="cantidad" placeholder='<?php echo $data['precio_rebajado'] ?>' value="">
    </div>
</div>
<label for="basic-url" class="form-label">Color</label>
<input  class="form-control" id="floatingInputValue" name="color" placeholder="Solo si hay colores disponibles">
</div>
<div class="col-6" style="   display: flex; align-items: center; justify-content: center;">
  <img id="imgen" class="d-block w-50" src="assets/img/<?php echo $data['imagen']; ?>" />
</div>
</div>
<label for="basic-url" class="form-label fw-bolder">Datos del cliente</label>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nombre Completo</label>
  <input  class="form-control" name="nombre" id="exampleFormControlInput1" placeholder="">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">WhatsApp / telefono</label>
  <input  class="form-control" name="telefono" id="exampleFormControlInput1" placeholder="">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Direccion</label>
  <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Enviar</button>
  </div>
  </form>
</div>
<?php  }
                } ?>
<footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ITSA 2022</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&locale=<?php echo LOCALE; ?>"></script>
    <script src="assets/js/scripts.js"></script>
    
</body>
</html>