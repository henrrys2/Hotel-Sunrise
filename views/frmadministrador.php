<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <title>FORMULARIO</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['administrador'])){
            header('Location: frmlogin.php');
        }
    ?>
    <div class="container">
        <div class="row form-group" id="cuarto">

        </div>
        
        <form action="../controllers/cclientes.php" method="POST">
          <div class="row form-group">
            <input type="hidden" name="accion" id="accion" value="cerrarsesion">
              <button type="submit" name="cerrar" class="btn btn-danger">Cerrar Sesion</button>
          </div>
        </form>
            <div class="row form-group">
                <a href="reporte.php" class="btn btn-danger">PDF</a>
            </div>
    </div>  

    <!-- Scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery351.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/frmadministrador.js"></script>
</body>
</html>