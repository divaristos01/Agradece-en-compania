<?php

  session_start();
  //Necesitar hacer include o require del archivo que tiene la conexión
  require 'configdb.php';

    $correo=$_POST["correo"];
    $contra=$_POST["contra"];

  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  //Conecta con la base de datos
    $conexion=conectar(); 

    $sql="SELECT idAlumno FROM ALUMNOS WHERE correo='".$_POST["correo"]."' AND contrasena='".$_POST["contra"]."'";

    /*echo $sql;
    echo '<br/>';*/

    $resultado=$conexion->query($sql);	

  if ($resultado->num_rows > 0){
    $fila = $resultado->fetch_array();

    $_SESSION['idAlumno'] = $fila["idAlumno"];

    header("Location: envio.php");
    exit();

  } else {
     header("Location: index.html"); 
    /*echo "Usuario o contraseña incorrectos";
    echo '<a href="index.html">Volver</a>';*/
}
?>