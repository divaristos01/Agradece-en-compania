<?php

  session_start();
  //Necesitar hacer include o require del archivo que tiene la conexión
  include 'configdbl.php';

    $alu=$_POST["alumno"];
    $mensaje=$_POST["mensaje"];

  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  //Conecta con la base de datos
    $conexion=conectar(); 

    $sql="INSERT INTO agradecimientos (mensaje, idEmisor, idReceptor) 
        VALUES ('".$mensaje."', '".$_SESSION["equipo"]."', '".$alu."')";

    echo $sql;
    
    echo '<br/>';

    $resultado=$conexion->query($sql);	

    if ($conexion->affected_rows > 0){
      echo '<b>MENSAJE ENVIADO CORRECTAMENTE</b>';

  } else {
    echo '<b>MENSAJE NO ENVIADO</b>';
}
?>