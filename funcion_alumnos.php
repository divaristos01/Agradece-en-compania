<?php
  //Necesitar hacer include o require del archivo que tiene la conexión
  include 'configdb.php';

  function conectar(){
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrar_alumnos(){ 
	//Conecta con la base de datos y crea el objeto $conexión.
	$conexion=conectar();  
	
	//Ejecuta la consulta sql
	$sql="SELECT idAlumno, nombre FROM ALUMNOS";
	$resultado=$conexion->query($sql);	
	
	//Extrae cada una fila del resultado de la consulta
	$fila1 = $resultado->fetch_array();
    $fila2 = $resultado->fetch_array();
    $fila3 = $resultado->fetch_array();

    echo '<p>';
    echo 'ID: '     . $fila1["idAlumno"];
    echo 'Nombre: ' . $fila1["nombre"];
    echo '</p>';

    echo '<p>';
    echo 'ID: '     . $fila2["idAlumno"];
    echo 'Nombre: ' . $fila2["nombre"];
    echo '</p>';

    echo '<p>';
    echo 'ID: '     . $fila3["idAlumno"];
    echo 'Nombre: ' . $fila3["nombre"];
    echo '</p>';
}
    mostrar_alumnos();
?>