<?php
require 'configdbl.php';

$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
$conexion->set_charset("utf8");

$sql = "SELECT idAlumno, nombre FROM alumnos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENVÍO</title>
    <link rel="stylesheet" href="PRUEBAS/estilos.css">
</head>
<body>
    <header>
        <h1>AGRADECE EN COMPAÑÍA</h1>
    </header>
    <nav id="navegador">
        <ul>
            <li><a href="envio.php">AGRADECER</a></li>
            <li><a href="">RECIBIR</a></li>
            <li><a href="cerrarsesion.php">CERRAR SESIÓN</a></li>
        </ul>
    </nav>
    <main>
        <form action="agradecer.php" method="POST">
            <div>
                <label for="alumno">PARA:</label>
                <select name="alumno" id="alumno">
                    <option value="">-- Selecciona un alumno --</option>
                    <?php while($fila = $resultado->fetch_array()){ ?>
                        <option value="<?php echo $fila["idAlumno"]; ?>">
                            <?php echo $fila["nombre"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="info">MENSAJE:</label>
                <textarea name="info" id="info"></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>