<?php require_once "config/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/login.css"> -->

    <title>Registrarse</title>
    
</head>
<body>
<header>
	<nav>
    <div class="container">
		<ul>
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Tutoriales</a></li>
			<li><a href="#">Cursos</a></li>
			<li><a href="#">Preguntame algo</a></li>
			<li><a href="#">Contacto</a></li>
		</ul>
    </div>
	</nav>
</header>
<section class="contenido wrapper">
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#Modal2">
	  Open modal
	</button>
	<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal2" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="ModalLabel">Modal with Scrolling Content</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Here is the content for modal, enter lengthy content so that you can see the scrolling effect.
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-info btn-md">Save</button>
	      </div>
	    </div>
	  </div>
	</div>

</section>
<style>
    /*Eliminamos los margenes y paddings que agrega el navegador por defecto*/
* {
  padding: 0;
  margin: 0;
}

header {
  background: rgba(0,0,0,0.9);
  width: 100%;
  position: fixed;
  z-index: 100;
}
nav {
  float: left; /* Desplazamos el nav hacia la izquierda */
}

nav ul {
  list-style: none;
  overflow: hidden; /* Limpiamos errores de float */
}

nav ul li {
  float: left;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

nav ul li a {
  display: block; /* Convertimos los elementos a en elementos bloque para manipular el padding */
  padding: 10px;
  color: #fff;
  text-decoration: none;
}

nav ul li:hover {
  background: #3ead47;
}
.contenido {
  padding-top: 80px;
}
.wrapper {
  width: 80%;
  margin: auto;
  overflow:hidden;
}

</style>
</body>
</html>