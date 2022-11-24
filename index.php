<?php include("cabeza.php");?>
<!-- <a href="#" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a> -->
<div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <!-- <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div> -->
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
    <img src="assets/img/p1.jpg" class="d-block w-100" alt="..." height=""> 
      <div class="carousel-caption d-none d-md-block">
        <h5>Descubre todos nuestros productos</h5>
        <p>Un cliente satisfecho es la mejor estrategia para nosotros</p>
      </div>
    </div>
    <!-- <div class="carousel-item" data-bs-interval="2000">
    <img src="assets/img/p2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Productos en oferta</h5>
        <p>Todo lo que buscas al mejor precio</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="assets/img/prueba4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div> -->
  </div>
  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>
</div>
<hr style="text-align: right; margin-right: 0px; margin: 0px;">
</div>
<!--  -->
<div id="nuestro" class="fw-bolder text-center" style="color: black; " > <br><h2>Nuestros productos</h2><br></div>
<!--  -->
    <!-- Header-->
    <section class=" my-3 py-3">
        <div class="container px-4 px-lg-3">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos mx-5" category="<?php echo $data['categoria']; ?>">
                            <div class=" h-100" style="width: 16rem;">
                                <!-- Sale badge-->
                                
                                <!-- Product image-->
                                <form class="text-center" method="post" action="mostar.php?accion=mostrar&id=<?php echo $data['id']; ?>">
                                <button class="btn"><img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." /></button>
                                </form> 
                                
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>                                     
                                        <div class="badge bg-danger text-white" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                                        <!-- Product reviews-->
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal'] ?>Bs</span>
                                        <?php echo $data['precio_rebajado'] ?>Bs
                                    </div><hr>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <!-- <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div> -->
                                    <form method="Post" action="añadir.php?accion=cli&id=<?php echo $data['id']; ?>&nombre=<?php echo $data['nombre']; ?>&precio=<?php echo $data['precio_rebajado']; ?>" class="btn">
                                    <button class="btn btn-warning text-center" type="submit">Añadir al carrito</button>
                                </form>
                                </div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ITSA 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>