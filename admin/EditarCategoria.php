<?php
require_once "../config/conexion.php";
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $query = mysqli_query($conexion, "UPDATE categorias SET categoria = '$nombre' where id = '$id'");
        if ($query) {
            header('Location: categorias.php');
        }
    }
}
?>
<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'cli') {
            $query = mysqli_query($conexion, "SELECT * FROM categorias WHERE id=$id");
        }
    }
}
?>
<?php include("includes/header.php");?>
<?php
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>

<form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">id</label>
                        <input type="text" readonly class="form-control-plaintext" name="id" value="<?php echo $data['id']; ?>">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['categoria'] ?>">
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>

                <?php  }
                } ?>




<?php include("includes/footer.php"); ?>