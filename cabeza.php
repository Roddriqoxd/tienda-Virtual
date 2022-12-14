<?php require_once "config/conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />

    <title>Toji online store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.png"/>
    <!-- Bootstrap icons-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>


<div >
    <nav id="navar" class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- <i class="fas fa-shopping-cart"></i> -->
            <div class="container">
                <img src="assets/img/logo.png" alt="" width="30" height="30">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav " >
                    <a href="index.php" class="nav-link" style="color: black;">TOJI ONLINE STORE</a>
                        <a href="http://localhost:8080/tiendavirtualtoji/index.php#nuestro" class="nav-link" category="all" >Todos los productos</a>
                        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <a href="http://localhost:8080/tiendavirtualtoji/index.php#nuestro" class="nav-link" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                        <?php } ?>
                    </ul>                    <div style="position: absolute; right:80px;">
                    <a class="btn btn-success" href="https://api.whatsapp.com/send/?phone=59162606558&" role="button" ><i class='fab fa-whatsapp-square'  style='font-size:25px;'></i></a>
                    <a class="btn btn-warning" href="lista.php" role="button" ><i class='fas fa-cart-arrow-down' style='font-size:25px;'></i>
                    <?php
                      $query2 = mysqli_query($conexion, "SELECT SUM(cantidad) FROM detalle where estado ='pendiente'");
                      while ($data2 = mysqli_fetch_assoc($query2)) { 
                        echo $data2['SUM(cantidad)'];
                          } ?>
                    </a>
                    </div>   
                </div>
            </div>
        </nav>
        <hr style="text-align: right; margin-right: 0px; margin: 0px;">

    </div>