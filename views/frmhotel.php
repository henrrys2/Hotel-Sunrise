<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel='stylesheet' href='css/pedidos.css' type='text/css'>
    <link rel='stylesheet' href='css/style1.css' type='text/css'>
    
    <title>HOTEL</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: frmlogin.php');
        }
        // echo $_REQUEST['usuario'];
    ?>
    <div class="container">
        <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$_SESSION['usuario']?>">
        <h2 align="center">CATEGORIAS</h2>
        
        <div class="row l"  id='listaCategorias'>
            
            
        </div>
        <form action="../controllers/cclientes.php" method="POST">
          <div class="row form-group">
          <div class="col-md-12" align="center">
            <input type="hidden" name="accion" id="accion" value="cerrarsesion">
              <button type="submit" name="cerrar" class="btn btn-danger">Cerrar Sesion</button>
          </div>
          </div>
        </form>
    </div>

    <!-- scripts -->
    <script src='js/jquery351.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/frmhotel.js'></script>

</body>
</html>