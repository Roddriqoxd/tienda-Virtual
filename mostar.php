<?php require_once "config/conexion.php"; ?>
<?php include("cabeza.php");?>
<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'mostrar') {
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
            }
        }
    }
?>
<!-- div -->
<!-- tituloo -->
<div>
    <br>
        <?php
            $result = mysqli_num_rows($query);
            if ($result > 0) {
            while ($data = mysqli_fetch_assoc($query)) { ?>
        <h1 class="fw-bolder text-center"><?php echo $data['nombre'] ?></h1>
</div>
<!-- fin titulo -->
<div class="container">
    <br>
    <div class="row " style="align-items: center;">
        <div class="col-4" >
            <!-- descripcionnnnn -->
            <h5 class="fw-bolder text-center">Detalles</h5>
            <p style="display: flex; text-align: justify;" ><?php echo $data['descripcion']; ?></p>
        </div>
            <!-- fin descripcionn -->
        <div class="col-6">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/img/<?php echo $data['imagen']; ?>" alt="..."/>
                    </div>
                    <div class="carousel-item">
                        <img class="cd-block w-100" src="assets/img/<?php echo $data['imagen2']; ?>" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/img/<?php echo $data['imagen4']; ?>" alt="..." />
                </div>
                </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
            </div>
        </div>
        <div class="col-2">
            <h5 class="fw-bolder text-center">Precio</h5>
            <div class="container" style="background-color: #adff2f;"><h3 class="text-center"><?php echo $data['precio_rebajado'] ?>Bs</h3></div>
            <h5 class="fw-bolder text-center">Disponible</h5>
            <h5 class="text-center"><?php echo $data['cantidad'] ?> Unidades</h5>
                            <div style="text-align: center;">
                            <form method="Post" action="añadir.php?accion=cli&id=<?php echo $data['id']; ?>&nombre=<?php echo $data['nombre']; ?>&precio=<?php echo $data['precio_rebajado']; ?>" class="btn">
                                    <button class="btn btn-warning text-center" type="submit">Añadir al carrito</button>
                                </form>
                        <!-- </div><hr>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
                                </div> -->
                <!-- <button class="btn btn-outline-dark" type="button" ">Agregar al carrito</button> -->
                            </div>
            </div>
        </div>
    </div>
</div>
<!-- inicio de mostrar fotos -->

<div id="diver" style="text-align:center;" class="mx-3">

        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img  data-bs-toggle="modal" data-bs-target="#exampleModal" class="img-thumbnail" src="assets/img/<?php echo $data['imagen']; ?>" width="100" />
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
            <img id="imgen" class="d-block w-100" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
            <style>#imgen:hover{transform: scale(1.5);}</style>
                </div>
            </div>
            </div>
        </div>
        
<!-- numero 2 -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <img  data-bs-toggle="modal" data-bs-target="#exampleModal2" class="img-thumbnail" src="assets/img/<?php echo $data['imagen2']; ?>" width="100" />
        </button>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
            <img id="imgen" class="d-block w-100" src="assets/img/<?php echo $data['imagen2']; ?>" alt="..." />
            <style>#imgen:hover{transform: scale(1.5);}</style>
                </div>
            </div>
        </div>
    </div>
<!-- numero fin -->
<!-- numero 2 -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal3">
            <img  data-bs-toggle="modal" data-bs-target="#exampleModal3" class="img-thumbnail" src="assets/img/<?php echo $data['imagen3']; ?>" width="100" />
        </button>
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
            <img id="imgen" class="d-block w-100" src="assets/img/<?php echo $data['imagen3']; ?>" alt="..." />
            <style>#imgen:hover{transform: scale(1.5);}</style>
                </div>
            </div>
        </div>
    </div>
    <!-- numero 2 -->
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal4">
            <img  data-bs-toggle="modal" data-bs-target="#exampleModal4" class="img-thumbnail" src="assets/img/<?php echo $data['imagen4']; ?>" width="100" />
    </button>
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
            <img id="imgen" class="d-block w-100" src="assets/img/<?php echo $data['imagen4']; ?>" alt="..." />
            <style>#imgen:hover{transform: scale(1.5);}</style>
                </div>
            </div>
        </div>
    </div>
<!-- --------------- -->
</div>
<!-- numero fin -->
<?php  }
                } ?>
<!-- fin div -->
 <!-- Footer-->
 <br><br>
 <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ITSA 2022</p>
        </div>
</footer>
    <!-- fin footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>