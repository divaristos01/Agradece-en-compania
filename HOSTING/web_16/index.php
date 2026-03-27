<?php
// Conecta con la base de datos
include 'conexion.php';

// Obtiene el mensaje de agradecimiento y el id del alumno que agradece
$sql = "select mensaje, idEmisor, idReceptor from agradecimientos
        where idAgradecimiento=" . $_GET["id"] . ";"; 

$resultado = $conexion->query($sql);
$fila = $resultado->fetch_array();

$mensaje = $fila["mensaje"]; 
$emisor = $fila["idEmisor"]; 
$receptor_id = $fila["idReceptor"]; 

// Obtiene el nombre del jesuita y su información de la tabla alumnos (del emisor)
$sql = "select nombreJesuita, infoJesuita from alumnos
        where equipo=" . $emisor; 
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_array();

$jesuita = $fila["nombreJesuita"]; 
$infoJesuita = $fila["infoJesuita"]; 

// Obtiene el nombre alumno al que se le agradece (receptor)
$sql = "select nombre from alumnos
        where equipo=" . $receptor_id; 
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_array();

$receptor = $fila["nombre"]; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENVÍO</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>AGRADECE EN COMPAÑÍA</h1>
    </header>
    <nav id="navegador">
        <ul>
            <li><a href="envio.php">AGRADECER</a></li>
            <li><a href="recibir.php">RECIBIR</a></li>
            <li><a href="cerrarsesion.php">CERRAR SESIÓN</a></li>
        </ul>
    </nav>
    <main>
        <h1>PARA <?php echo $receptor; ?></h1>
        <div id="recibir">
            <div id="imagen">
                <img src="PRUEBAS/imagen/jesuita.jpg" alt="<?php echo $jesuita; ?>">
            </div>
            <h3><?php echo $jesuita; ?></h3>
            <p><?php echo $mensaje; ?></p>
        </div>
    </main>
</body>
</html>