document.querySelector("#enviar").addEventListener("click", e => {
    e.preventDefault();
  
    //INGRESE UN NUMERO DE WHATSAPP VALIDO AQUI:
    const telefono = "59162606558";
  
    const producto = document.querySelector("#producto").value;
    const nuevoSaldo = document.querySelector("#nuevoSaldo").value;
    const cantidad = document.querySelector("#numero").value;
    const nombre = document.querySelector("#nombre").value;
    const apellido = document.querySelector("#apellido").value;
    const tel = document.querySelector("#tel").value;
    const direccion = document.querySelector("#direccion").value;
    const resp = document.querySelector("#respuesta");
  

  
    const url = `https://api.whatsapp.com/send?phone=${telefono}&text=
          *_¡Hola!_ _TOJI_*%0A
          *Quisiera coordinar la siguiente entrega:*%0A%0A
          *Producto:* ${producto}%0A
          *Cantidad:* ${cantidad}%0A
          *Mi nombre es:* ${nombre} ${apellido} %0A
          *Mi direccion es:* ${direccion}%0A
          %0A
          Telefono de referencia: ${tel}%0A
          Cantidad a pagar: ${nuevoSaldo} %0A`;
  


  
    window.open(url);
  });