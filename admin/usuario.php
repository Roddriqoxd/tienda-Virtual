<?php
require_once "../config/conexion.php";
if (isset($_POST)) {
    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $query = mysqli_query($conexion, "INSERT INTO usuarios(usuario,nombre,clave) VALUES ('$usuario','$nombre','$clave')");
        if ($query) {
            header('Location: usuario.php');
        }
    }
}
include("includes/header.php");
?>
<!-- dividir en 2 -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirCategoria"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Clave</th> 
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM usuarios ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['usuario']; ?></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td ><input type="password" class="form-control-plaintext" value="<?php echo $data['clave']; ?>"></td> 
                            <td>
                                <form method="post" action="eliminar.php?accion=user&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                <form method="Post" action="editarUsuario.php?accion=cli&id=<?php echo $data['id']; ?>" class="d-inline">
                                    <button class="btn btn-success" type="submit">Editar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="categorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="title">Nuevo usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input  class="form-control" type="text" name="nombre" placeholder="" required>
                        <label for="nombre">Cuenta</label>
                        <input  class="form-control" type="text" name="usuario" placeholder="" required>
                        <label for="nombre">contraseña</label>
                        <input  class="form-control" type="text" name="clave" placeholder="" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>