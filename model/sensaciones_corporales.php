<?php
class Sensaciones_corporales {
    private $id_registro;
    private $id_linea;
    private $fecha;
    private $ejercicio_provocador;
    private $numero_repeticion;
    private $miedo_maximo;

    
    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM sensaciones_corporales where id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    } 

    static function deleteById($link, $id) {
        try {
            $consulta = "DELETE FROM sensaciones_corporales WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id_registro, $id_linea, $fecha, $ejercicio_provocador, $numero_repeticion, $miedo_maximo) {
        $this->id_registro = $id_registro;
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->ejercicio_provocador = $ejercicio_provocador;
        $this->numero_repeticion = $numero_repeticion;
        $this->miedo_maximo = $miedo_maximo;
    }

    // Getters

    public function getIdRegistro() {
        return $this->id_registro;
    }

    public function getIdLinea() {
        return $this->id_linea;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEjercicioProvocador() {
        return $this->ejercicio_provocador;
    }

    public function getNumeroRepeticion() {
        return $this->numero_repeticion;
    }

    public function getMiedoMaximo() {
        return $this->miedo_maximo;
    }

    // Setters
    public function setIdRegistro($id_registro) {
        $this->id_registro = $id_registro;
    }

    public function setIdLinea($id_linea) {
        $this->id_linea = $id_linea;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setEjercicioProvocador($ejercicio_provocador) {
        $this->ejercicio_provocador = $ejercicio_provocador;
    }

    public function setNumeroRepeticion($numero_repeticion) {
        $this->numero_repeticion = $numero_repeticion;
    }

    public function setMiedoMaximo($miedo_maximo) {
        $this->miedo_maximo = $miedo_maximo;
    }

    function insertar($link) {
        try {
            $consulta = "INSERT INTO `sensaciones_corporales` (`id_registro`, `id_linea`, `fecha`, `ejercicio_provocador`, `numero_repeticion`, `miedo_maximo`) 
                         VALUES (:id_registro, :id_linea, :fecha, :ejercicio_provocador, :numero_repeticion, :miedo_maximo)";
            $result = $link->prepare($consulta);
            // Enlaza los parámetros con los valores de la instancia actual
            $result->bindParam(":id_registro", $this->id_registro);
            $result->bindParam(":id_linea", $this->id_linea);
            $result->bindParam(":fecha", $this->fecha);
            $result->bindParam(":ejercicio_provocador", $this->ejercicio_provocador);
            $result->bindParam(":numero_repeticion", $this->numero_repeticion);
            $result->bindParam(":miedo_maximo", $this->miedo_maximo);
            $result->execute();
            return $result;
        } catch(PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    
}
?>
