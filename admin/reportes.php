<?php

include("includes/header.php");
?>
                  <div class="container-fluid">
  <form class="d-flex">
			<form action="" method="GET">
			<input class="form-control me-2" type="search" placeholder="Buscar con PHP" 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar </b> </button> 
			</form>
  </div>
  <?php
$conexion=mysqli_connect("localhost","root","1234","toji"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE formulario.nombre LIKE'%".$busqueda."%'";
	}
  
}


?>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i>Filtrar</a>
    <a href="pdf_reportes.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-smr" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i>imprimir</a>
<br>
<br>
    <h1 class="h3 mb-0 text-gray-800 text-center">Reporte de ventas por fecha</h1>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover" style="width: 100%;">
                <thead class="thead">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php

$conexion=mysqli_connect("localhost","root","1234","toji");               
$SQL="SELECT * FROM formulario where estado ='2' $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){

                ?>
                        <tr>
                            <td><?php echo $data['producto']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                            <td><?php echo $data['fecha']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                        </tr>
                        <?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>
                        <hr>
                        <?php
                    $query2 = mysqli_query($conexion, "SELECT SUM(total) FROM formulario where estado ='2' ");
                    while ($data2 = mysqli_fetch_assoc($query2)) { ?>
                        <td>Total de ventas: </td>
                        <td></td>
                        <td></td>
                        <td><?php echo $data2['SUM(total)']; ?></td>
                        <?php } ?>
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
                        <input id="" class="form-control" type="text" name="year" placeholder="Ejemplo: 2022" required>
                    </div>
                    <div>
                    <label for="nombre">Mes</label>
                        <input id="" class="form-control" type="text" name="month" placeholder="Ejemplo: 01" required>
                    </div>
                    <div class="form-group">
                        <input id="" class="form-control" type="submit" name="enviar" style="color: dark;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>