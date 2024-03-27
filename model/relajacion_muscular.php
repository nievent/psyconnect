<?php
class Relajacion_muscular extends Registro {
    private $id_linea;
    private $fecha;
    private $momento_dia;
    private $relajacion_conseguida;
    private $concentracion_conseguida;

    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM relajacion_muscular where id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    } 

    function __construct($id_linea, $fecha, $momento_dia, $relajacion_conseguida, $concentracion_conseguida) {
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->momento_dia = $momento_dia;
        $this->relajacion_conseguida = $relajacion_conseguida;
        $this->concentracion_conseguida = $concentracion_conseguida;
    }

    // Getters
    public function getIdLinea() {
        return $this->id_linea;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getMomentoDia() {
        return $this->momento_dia;
    }

    public function getRelajacionConseguida() {
        return $this->relajacion_conseguida;
    }

    public function getConcentracionConseguida() {
        return $this->concentracion_conseguida;
    }

    // Setters
    public function setIdLinea($id_linea) {
        $this->id_linea = $id_linea;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setMomentoDia($momento_dia) {
        $this->momento_dia = $momento_dia;
    }

    public function setRelajacionConseguida($relajacion_conseguida) {
        $this->relajacion_conseguida = $relajacion_conseguida;
    }

    public function setConcentracionConseguida($concentracion_conseguida) {
        $this->concentracion_conseguida = $concentracion_conseguida;
    }
}
?>
