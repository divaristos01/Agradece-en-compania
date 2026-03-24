<?php
  //Necesitar hacer include o require del archivo que tiene la conexión
  include 'configdb.php';

    $correo=$_POST["correo"];
    $contra=$_POST["contra"];

  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  //Conecta con la base de datos
    $conexion=conectar(); 

    $sql="'SELECT idAlumno FROM ALUMNOS WHERE correo='".$correo."' AND foto='".$contra."';"

    echo $sql;
    echo '<br/>';

    $resultado=$conexion->query($sql);	
?>