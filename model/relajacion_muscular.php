<?php
class Relajacion_muscular{
    private $id_registro;
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

    static function deleteById($link, $id) {
        try {
            $consulta = "DELETE FROM relajacion_muscular WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id_registro, $id_linea, $fecha, $momento_dia, $relajacion_conseguida, $concentracion_conseguida) {
        $this->id_registro = $id_registro;
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->momento_dia = $momento_dia;
        $this->relajacion_conseguida = $relajacion_conseguida;
        $this->concentracion_conseguida = $concentracion_conseguida;
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
    public function setIdRegistro($id_registro) {
        $this->id_registro = $id_registro;
    }

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

    function insertar($link) {
        try {
            $consulta = "INSERT INTO `relajacion_muscular` (`id_registro`, `id_linea`, `fecha`, `momento_dia`, `relajacion_conseguida`, `concentracion_conseguida`) 
                         VALUES (:id_registro, :id_linea, :fecha, :momento_dia, :relajacion_conseguida, :concentracion_conseguida)";
            $result = $link->prepare($consulta);
            // Enlaza los parámetros con los valores de la instancia actual
            $result->bindParam(":id_registro", $this->id_registro);
            $result->bindParam(":id_linea", $this->id_linea);
            $result->bindParam(":fecha", $this->fecha);
            $result->bindParam(":momento_dia", $this->momento_dia);
            $result->bindParam(":relajacion_conseguida", $this->relajacion_conseguida);
            $result->bindParam(":concentracion_conseguida", $this->concentracion_conseguida);
            $result->execute();
            return $result;
        } catch(PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
}
?>
