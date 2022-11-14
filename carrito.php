<?php 
include("cabeza.php");
require_once "config/config.php";
?>

    <!-- Header-->
    <br>
    <div class="container text-center">
    <h2>Carrito de compras</h2>
    </div>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: <span id="total_pagar">0.00</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container text-center">
    <h2>Formulario de entregas</h2><br><br>
    </div>
    <!-- formulario -->
    <div class="container">
    <form action="enviar.php" method="POST" enctype="multipart/form-data" autocomplete="off">


<h5 for="basic-url" class="form-label fw-bolder">Datos del cliente</h5>
<div class="row"><hr>
    <div class="col-6">
    <label for="basic-url" class="form-label">Producto</label>
    <textarea type="text" readonly name="producto" class="form-control-plaintext" id="prueba" ></textarea>
    </div>
    <div class="col-3 text-center">
    <label for="basic-url" class="form-label">Total</label>
    <input type="text" readonly name="total" class="form-control-plaintext text-center" id="total" style="font-size: 20px;" >
    </div>
    <div class="col-3 text-center">
    <label for="basic-url" class="form-label">Cantidad</label>
    <input type="text" readonly name="cantidad" class="form-control-plaintext text-center" id="xx" style="font-size: 20px;" >
    </div>
</div>
<div class="row">
    <div class="col-6">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input  class="form-control" name="nombre" id="exampleFormControlInput1" placeholder="" required>
    </div>
    <div class="col-6">
    <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
  <input  class="form-control" name="apellido" id="exampleFormControlInput1" placeholder="" required>
    </div>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">WhatsApp / telefono</label>
  <input class="form-control" type="text" name="telefono"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'required />
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" required>Direccion</label>
  <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Enviar</button>
  </div>
  </form>
  </div>
  <br>
  <br>
    <!-- formulario -->
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
    <script>
        mostrarCarrito();
        function mostrarCarrito() {
            if (localStorage.getItem("productos") != null) {
                let array = JSON.parse(localStorage.getItem('productos'));
                if (array.length > 0) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        async: true,
                        data: {
                            action: 'buscar',
                            data: array
                        },
                        success: function(response) {
                            console.log(response);
                            const res = JSON.parse(response);
                            let html = '';
                            res.datos.forEach(element => {
                                
                                html += `
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td>${element.precio}</td>
                                <td>1</td>
                                <td>${element.precio}</td>
                            </tr>
                            `;
                            });
                            
                            $('#tblCarrito').html(html);
                            document.getElementById("total").value = res.total;
                            $('#total_pagar').text(res.total);

                            let png = '';
                            res.datos.forEach(element => {
                                png += `${element.nombre}  
`;
                            });
                            document.getElementById("prueba").value = png;

                            let x = 0;
                            res.datos.forEach(element => {
                                x +=1;
                            });
                            document.getElementById("xx").value = x;
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            }
        }
    </script>
</body>

</html>