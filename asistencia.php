<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asistencia</title>
</head>
<body>
    <?php
    require_once('../FORMULARIOASIS/conexion.php');
    $sql = "SELECT id, nombre FROM persona";
    $resultado = $conexion->query($sql);
    ?>
    <h1>REGISTRO DE ASISTENCIA DE ALUMNOS</h1>
    <form action="clases/asistencia.php" method="get">
        <label for="nombre">
            NOMBRE:
            <select name="id_persona" id="nombre">
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                }
                ?>
            </select>
        </label>
        <br><br>
        <label for="asistencia_a">
            ASISTIÓ:
            <input type="radio" name="asistencia" id="asistencia_a" value="A">
        </label>
        <label for="asistencia_t">
            TARDANZA:
            <input type="radio" name="asistencia" id="asistencia_t" value="T">
        </label>
        <label for="asistencia_f">
            FALTA:
            <input type="radio" name="asistencia" id="asistencia_f" value="F">
        </label>
        <br><br>
        <input type="submit" value="Registrar Asistencia">
        <a href="index.php">Registrar Alumno</a>
    </form>
</body>
</html>