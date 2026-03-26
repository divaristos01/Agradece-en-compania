<?php

  session_start();
  //Necesitar hacer include o require del archivo que tiene la conexión
  require 'configdbl.php';

    $usuario=$_POST["usuario"];
    $contra=$_POST["contra"];

  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  //Conecta con la base de datos
    $conexion=conectar(); 

    $sql="SELECT equipo FROM alumnos WHERE usuario='".$_POST["usuario"]."' AND password='".$_POST["contra"]."'";

    /*echo $sql;
    echo '<br/>';*/

    $resultado=$conexion->query($sql);	

  if ($resultado->num_rows > 0){
    $fila = $resultado->fetch_array();

    $_SESSION['equipo'] = $fila["equipo"];

    header("Location: envio.php");
    exit();

  } else {
     header("Location: index.html"); 
    /*echo "Usuario o contraseña incorrectos";
    echo '<a href="index.html">Volver</a>';*/
}
?>