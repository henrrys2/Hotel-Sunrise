<?php
require_once("../models/clientes.php");
require_once("../models/administrador.php");
$accion=$_REQUEST['accion'];
switch($accion)
{
    case 'newcliente':
        $nombres=$_REQUEST['nombres'];
        $apellidos=$_REQUEST['apellidos'];
        $correo=$_REQUEST['correo'];
        $password=$_REQUEST['password'];
        if(isset($_REQUEST['administrador'])){
            $cli= new administrador(0,$nombres,$apellidos,$correo,$password);
        }else{
            $cli= new cliente(0,$nombres,$apellidos,$correo,$password);
        }
        
        $l=$cli->validar();
        if($l[0]==0)
        {
            $l=$cli->guardarcli();
            echo($l);
            
        }
        else
        {
            echo(0);
        }
    break;
    case 'cerrarsesion':
        session_start();
        session_destroy();
        header('location: ../views/frmlogin.php');
    break;
    case 'login':
        $correo=$_REQUEST['correo'];
        $password=$_REQUEST['password'];
        if(isset($_REQUEST['administrador'])){
            $cli= new administrador(0,"","",$correo,$password);
            $p=$cli->login();
            if($p[0]>0)
            {
                session_start();
                $_SESSION['administrador'] = $p[0];
                echo("frmadministrador.php");
                // header("Location:../views/frmhotel.html");
            }
            else{
                echo("frmlogin.php?Error=si");
                // header("Location:../views/frmlogin.html?Error=si");
            }
        }
        else{
            
            $cli= new cliente(0,"","",$correo,$password);
            $p=$cli->login();
            if($p[0]>0)
            {
                session_start();
                $_SESSION['usuario'] = $p[0];
                echo("frmhotel.php");
                // header("Location:../views/frmhotel.html");
            }
            else{
                echo("frmlogin.php?Error=si");
                // header("Location:../views/frmlogin.html?Error=si");
            }
        }

    break;
}


?>