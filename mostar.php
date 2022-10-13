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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class=" my-3 py-3">
        <div class="container px-4 px-lg-3">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                       
                                        <p><?php echo $data['descripcion']; ?></p>
                                        
                <?php  }
                } ?>

            </div>
        </div>
    </section>
</body>
</html>