<?php
class Estado_animo extends Registro {
    private $id_linea;
    private $fecha;
    private $emociones;
    private $grado_intensidad;
    private $sensaciones_corporales;

    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM estado_animo where id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    } 

    function __construct($id_linea, $fecha, $emociones, $grado_intensidad, $sensaciones_corporales) {
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->emociones = $emociones;
        $this->grado_intensidad = $grado_intensidad;
        $this->sensaciones_corporales = $sensaciones_corporales;
    }

    // Getters
    public function getIdLinea() {
        return $this->id_linea;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEmociones() {
        return $this->emociones;
    }

    public function getGradoIntensidad() {
        return $this->grado_intensidad;
    }

    public function getSensacionesCorporales() {
        return $this->sensaciones_corporales;
    }

    // Setters
    public function setIdLinea($id_linea) {
        $this->id_linea = $id_linea;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setEmociones($emociones) {
        $this->emociones = $emociones;
    }

    public function setGradoIntensidad($grado_intensidad) {
        $this->grado_intensidad = $grado_intensidad;
    }

    public function setSensacionesCorporales($sensaciones_corporales) {
        $this->sensaciones_corporales = $sensaciones_corporales;
    }
}
?>
