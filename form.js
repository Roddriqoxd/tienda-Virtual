document.querySelector("#enviar").addEventListener("click", e => {
    e.preventDefault();
  
    //INGRESE UN NUMERO DE WHATSAPP VALIDO AQUI:
    const telefono = "59162606558";
  
    const cliente = document.querySelector("#cliente").value;
    const fecha = document.querySelector("#fecha").value;
    const hora = document.querySelector("#hora").value;
    const empleado = document.querySelector("#empleado").value;
    const servicio = document.querySelector("#servicio").value;
    const resp = document.querySelector("#respuesta");
  
    resp.classList.remove("send");
  
    const url = `https://api.whatsapp.com/send?phone=${telefono}&text=
          *_MI NEGOCIO_*%0A
          *Reservas*%0A%0A
          *¿Cuál es tu nombre?*%0A
          ${cliente}%0A
          *Indica la fecha de tu reserva*%0A
          ${fecha}%0A
          *Indica la hora de tu reserva*%0A
          ${hora}%0A
          *Empleado de preferencia*%0A
          ${empleado}%0A
          *¿Cuál es el servicio que se desea realizar?*%0A
          ${servicio}`;
  

    resp.classList.add("send");
    resp.innerHTML = `Se ha enviado tu reserva, ${cliente}`;
  
    window.open(url);
  });