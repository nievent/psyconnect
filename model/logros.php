<?php
class Logros extends Registro {
    private $id_linea;
    private $fecha;
    private $que_he_logrado;
    private $acciones_realizadas;
    private $como_me_siento;
    private $premio_obtenido;

    
    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM logros WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id_linea, $fecha, $que_he_logrado, $acciones_realizadas, $como_me_siento, $premio_obtenido) {
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->que_he_logrado = $que_he_logrado;
        $this->acciones_realizadas = $acciones_realizadas;
        $this->como_me_siento = $como_me_siento;
        $this->premio_obtenido = $premio_obtenido;
    }

    // Getters
    public function getIdLinea() {
        return $this->id_linea;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getQueHeLogrado() {
        return $this->que_he_logrado;
    }

    public function getAccionesRealizadas() {
        return $this->acciones_realizadas;
    }

    public function getComoMeSiento() {
        return $this->como_me_siento;
    }

    public function getPremioObtenido() {
        return $this->premio_obtenido;
    }

    // Setters
    public function setIdLinea($id_linea) {
        $this->id_linea = $id_linea;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setQueHeLogrado($que_he_logrado) {
        $this->que_he_logrado = $que_he_logrado;
    }

    public function setAccionesRealizadas($acciones_realizadas) {
        $this->acciones_realizadas = $acciones_realizadas;
    }

    public function setComoMeSiento($como_me_siento) {
        $this->como_me_siento = $como_me_siento;
    }

    public function setPremioObtenido($premio_obtenido) {
        $this->premio_obtenido = $premio_obtenido;
    }
}
?>
