<?php
class Sensaciones_corporales extends Registro {
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

    function __construct($id_linea, $fecha, $ejercicio_provocador, $numero_repeticion, $miedo_maximo) {
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->ejercicio_provocador = $ejercicio_provocador;
        $this->numero_repeticion = $numero_repeticion;
        $this->miedo_maximo = $miedo_maximo;
    }

    // Getters
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
}
?>
