<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reservas MI NEGOCIO</title>
    <link rel="stylesheet" href="css/estilos.css" />
  </head>
  <body>


    <form action="" class="form">
      <img src="logo.jpg" class="imgLogo" />

      <h1 class="">MI NEGOCIO</h1>
      <h3 class="">Reservas</h3>
      <p class="">
        Llena este pequeño formulario para agendar tu cita en MI NEGOCIO.
      </p>

      <label for="cliente" class="formulario__label">¿Cuál es tu nombre?</label>
      <input
        id="cliente"
        type="text"
        class=""
        placeholder="Indica cuál es tu nombre completo"
      />

      <label for="fecha" class="formulario__label"
        >Indica la fecha de tu reserva</label
      >
      <input
        id="fecha"
        type="date"
        class=""
        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
      />

      <label for="hora" class=""
        >Indica la hora de tu reserva</label
      >
      <input id="hora" type="time" class="formulario__input" />

      <label for="empleado" class=""
        >EMPLEADO de preferencia</label
      >
      <select id="empleado" name="listaempleados" class="">
        <option>EMPLEADO 1</option>
        <option>EMPLEADO 2</option>
      </select>

      <label for="servicio" class=""
        >¿Cuál es el servicio que se desea realizar?</label
      >
      <select id="servicio" name="listaservicios" class="">
        <option>SERVICIO 1 - $VALOR</option>
        <option>SERVICIO 2 - $VALOR</option>
        <option>SERVICIO 3 - $VALOR</option>
        <option>SERVICIO 4 - $VALOR</option>
        <option>SERVICIO 5 - $VALOR</option>
      </select>

      <div id="respuesta"></div>

      <button id="enviar">Enviar a WhatsApp</button>
    </form>
    <script src="form.js"></script>
  </body>
</html>