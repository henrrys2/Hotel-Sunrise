<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel='stylesheet' href='css/style.css' type='text/css'>
    
    <title>Sunrise</title>
</head>
<body>
   <!-- Listo prro ya funciona gaaaaa!!! -->
   <?php
      if(isset($_REQUEST['Error']) && $_REQUEST['Error'] == 'si'){
   ?>
   <script>
      Toastify({
      text: "⚠ Error, las credenciales no coinciden",
      duration: 3000, 
      newWindow: true,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: 'right', // `left`, `center` or `right`
      backgroundColor: "red",
      stopOnFocus: true, // Prevents dismissing of toast on hover
      onClick: function(){} // Callback after click
      }).showToast();
   </script>
   <?php
    }
   ?>

    <div class="sidenav">
        <div class="login-main-text">
           <h2>Hotel<br> Sunrrise </h2>
           <p>Logearse o Registrarse para ingresar</p>
        </div>
     </div>
     <div class="main">
        <div class="col-md-6 col-sm-12">
           <div class="login-form">
                 <div class="form-group">
                    <label class="letras">Correo</label>
                    <input type="text" class="form-control" placeholder="xxxxx@gmail.com" name="correo" id="correo">
                 </div>
                 <div class="form-group">
                    <label class="letras">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                 </div>
                 <div class="form-group">
                    <label for="administrador" class="letras">Administrador</label>
                    <input type="checkbox"   name="administrador" id="administrador" value="1">
                 </div>
                 <button type="button" class="btn btn-black" onclick="login()">Ingresar</button>
                 <a href="frmregistro.html" class="btn btn-secondary">Registrarse</a>
           </div>
        </div>
     </div>
    </div>



    <!-- Scripts -->
    <script src='js/jquery351.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/frmprincipal.js'></script>
</body>
</html>