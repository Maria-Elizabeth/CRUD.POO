<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
</head>
<body>
    <h1>REGISTRO DE ALUMNOS</h1>
   <form action="clases/alumnos.php" method="get">
    <label for="dni">
        DNI:
        <input type="number" name="dni" id="dni">
    </label>
    <br><br>
    <label for="nombre">
       NOMBRE:
      <input type="text" name="nombre" id="nombre">
    </label>
    <br><br>
    <label for="apellido">
        APELLIDO :
       <input type="text" name="apellido" id="apellido">
    </label>
    <br><br>
    <label for="genero">
       MASCULINO:
        <input type="radio" name="genero" id="genero" value="masculino">
    </label>
    <label for="genero">
        FEMENINO:
        <input type="radio" name="genero" id="genero" value="FEMENINO">
    </label>
    <br><br>
    <input type="submit" value="registrar alumno">
    <a type="button" href = "asistencia.php">REGISTRAR ASISTENCIA</a>
   </form>
</body>
</html>