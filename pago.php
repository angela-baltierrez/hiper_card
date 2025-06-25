<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../hiper_card/assets/css/pago.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
   
            <div style="display: flex; vertical-align: top; justify-content: center;">
      
            <form method="POST" action="../hiper_card/factura.php">
                  
                
                    <div class="form-group">
                    
                   <div style="display: flex;">

                    <label style="display: inline-block; vertical-align: top;">nombre:</label>
                    <label style="display: inline-block; vertical-align: top; padding-left: 129px;">apellido:</label>
                    </div>



                    <div style="display: flex; padding-bottom: 10px;">
                    <input  type="text"placeholder="ingresa tu nombre"  style="display: inline-block; vertical-align: top;">
                    <input type="text" placeholder="ingresa tu apellido" style="display: inline-block; vertical-align: top;">
                    </div>

                    <select name="tipo_pago" required>
  <option value="Crédito">Tarjeta de Crédito</option>
  <option value="Débito">Tarjeta de Débito</option>
</select>

<div style="display: flex;">
<div class="img"></div>
<div class="img2" style="display: inline-block; vertical-align: top;padding-left: 50px; "></div>
</div>

                    <label style="display: inline-block; vertical-align: top;">numero de la tarjeta:</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa tu numero de targeta" maxlength="16" required autocomplete="current-password">

                    <div style="display: flex;">

                    <label style="display: inline-block; vertical-align: top;">Vencimiento:</label>
                    <label style="display: inline-block; vertical-align: top; padding-left: 100px;">CSC:</label>
                    </div>
                    <div style="display: flex;">
                  
                    <input  type="text"placeholder="MM/AA" maxlength="4"  style="display: inline-block; vertical-align: top;">
                    
                    <input type="text" placeholder="ingrese 3 digitos" maxlength="3" style="display: inline-block; vertical-align: top;">
                    </div>
                    </div>
                <label style="display: inline-block; vertical-align: top;">Dirección de facturación</label>
                    <input type="text" name="password" placeholder="Ingresa tu dirección" required autocomplete="current-password">
<label style="display: inline-block; vertical-align: top;">Telefono</label>
                    <input type="text" name="password" placeholder="Ingrese su telefono" required autocomplete="current-password" style="margin-block-end: 5%;">

                    <div class="form-group button-class">
                    <button id= "submit" type="submit" style="color: #fff;">confirmar
                    </button>
                    </div>
            </form>
              <script>
    // Guardar carrito y enviarlo con el formulario usando fetch()
    document.getElementById('formPago').addEventListener('submit', function (e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);

      // Agregar carrito desde localStorage
      const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

      formData.append('carrito', JSON.stringify(carrito));

      fetch('procesar-pago.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        alert(data);
        localStorage.removeItem('carrito'); // Limpia el carrito
        window.location.href = 'superpagina.php'; // Redirigir
      })
      .catch(err => console.error(err));
    });
  </script>
            </div>
        </div>
        </div>
    </div> 
 </div>
</body>
   <script>
        document.getElementById('submit').addEventListener('click', () => {
            window.location.href = 'factura.php';
        });
    </script>
<style>

</style>
</html>