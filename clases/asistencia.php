<?php
require_once("../conexion.php");
class asistencia{

    public $id_persona,$asistencia;
    public $conexion;
    public  function __construct( $conexion,$id_persona,$asistencia) {
        $this->conexion = $conexion;
        $this->id_persona = $id_persona;
        $this->asistencia = $asistencia;
    }
    public function registrarAsistencia()
    {
        $sql = "INSERT INTO `asistencia`(`id_persona`, `asistencia`) VALUES ('$this->id_persona','$this->asistencia')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "la asistencia fue registrado correctamente";
        } else {
            echo "Error al registrar asistencia: " . mysqli_error($this->conexion);
        }
    }
    public function mostrarRegistro(){
        $sql ="SELECT p.dni , p.nombre, p.apellido, a.asistencia FROM  persona p, asistencia a";
        $resultado = mysqli_query($this->conexion,$sql );
        if($resultado ){
            if(mysqli_num_rows($resultado) > 0){
                while($fila = mysqli_fetch_assoc($resultado)){
                    echo "DNI :" . $fila['dni'] . "<br>";
                    echo "NOMBRE :" . $fila['nombre'] . "<br>";
                    echo "APELLIDOS :" . $fila['apellido'] . "<br>";
                    echo "ASISTENCIA :" . $fila['asistencia'] . "<br>";
                    echo "<hr>";
                }
            }else{
                echo "no hay alumnos registrados";
            }
        }else{
            echo "error en la consulta :" . mysqli_error(($this->conexion));
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_persona = $_GET['id_persona'];
    $asistencia = $_GET['asistencia'];
   
    // Crear una instancia de la clase Libro
    $persona = new  asistencia($conexion, $id_persona, $asistencia);

    // Registrar el libro en la base de datos
    $persona->registrarAsistencia();
    $persona->mostrarRegistro();
}
