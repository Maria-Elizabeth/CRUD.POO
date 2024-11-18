<?php
require_once("../conexion.php");

class persona{
    public $dni, $nombre,$apellido,$genero;
    public $conexion;

    public  function __construct( $conexion,$dni, $nombre,$apellido,$genero) {
        $this->conexion = $conexion;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->genero = $genero;

    }
    public function registrarAlumno()
    {
        $sql = "INSERT INTO persona( dni, nombre, apellido, genero) VALUES ('$this->dni','$this->nombre','$this->apellido','$this->genero')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "alumno registrado correctamente";
            echo "<br>";
        } else {
            echo "Error al registrar el alumno: " . mysqli_error($this->conexion);
        }
    }

    public function mostrarAlumno(){
        $sql ="SELECT * FROM persona" ;
        $resultado = mysqli_query($this->conexion,$sql );
        if($resultado ){
            if(mysqli_num_rows($resultado) > 0){
                while($fila = mysqli_fetch_assoc($resultado)){
                    echo "DNI :" . $fila['dni'] . "<br>";
                    echo "NOMBRE :" . $fila['nombre'] . "<br>";
                    echo "APELLIDOS :" . $fila['apellido'] . "<br>";
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
    $dni = $_GET['dni'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $genero = $_GET['genero'];
   
    // Crear una instancia de la clase Libro
    $persona = new  persona($conexion,$dni, $nombre,$apellido,$genero);

    // Registrar el libro en la base de datos
    $persona->registrarAlumno();
    $persona->mostrarAlumno();
}


