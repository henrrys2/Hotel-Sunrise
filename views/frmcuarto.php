<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel='stylesheet' href='css/pedidos.css' type='text/css'>
    <title>CUARTOS</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: frmlogin.php');
        }
        if(!isset($_REQUEST['id'])){
            header('Location: frmhotel.php');
        }
    ?>
    <?php
        if(isset($_REQUEST['id']) && isset($_SESSION['usuario'])){
            // echo $_REQUEST['id'];
    ?>
        <input type="hidden" name="idcategoria" id="idcategoria" value= <?=$_REQUEST['id']?>>
        <input type="hidden" name="idusuario" id="idusuario" value= <?=$_SESSION['usuario']?>>
    <?php
        }
    ?>
    <div class="container">
        <div class="row form-group" id="cuarto">

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

    <!-- Modal Productos -->
	<div id="mymodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
  
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="idcuarto" id="idcuarto" value="">
                <h4 class="modal-title">Agregando Reservacion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <label for="date">Fecha de Reservacion</label>
                    <input type='date' id='date' name="date" class='form-control' onchange="calcularCosto()">
                </div>
                <div class="form-group">
                    <label for="date2">Fecha de Salida</label>
                    <input type='date' id='date2' name="date2" class='form-control' onchange="calcularCosto()">
                </div>
                <div class="form-group">
                    <label for="costo">Costo</label>
                    <input type='text' id='costo' name="costo" disabled class='form-control'>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class='btn btn-success' data-dismiss="modal" onclick='newreservacion()'>Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
  
        </div>
      </div>
     <!-- scripts -->
     <script src='js/jquery351.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src='js/frmcuarto.js'></script>
</body>
</html>