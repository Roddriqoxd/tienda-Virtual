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
    <h1 class="h3 mb-0 text-gray-800 text-center">Productos menores a 10 unidades</h1>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
           
        </div>
    </div>
</div>
<section class=" my-3 py-3">
        <div class="container px-4 px-lg-3">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($conexion, "SELECT * FROM productos where cantidad <= '10'");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos mx-5">
                            <div class=" h-100" style="width: 16rem;">
                                <!-- Sale badge-->
                                
                                <!-- Product image-->

                                <button class="btn"><img class="card-img-top" src="../assets/img/<?php echo $data['imagen']; ?>" alt="..." /></button>

                                <div class="card-body p-4">
                                    <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                                    <h5 class="fw-bolder">Unidades: <?php echo $data['cantidad'] ?></h5>
                                    </div><hr>
                                    
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>
<?php include("includes/footer.php"); ?>