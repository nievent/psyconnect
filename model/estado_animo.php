<?php
class Estado_animo {
    private $id_registro;
    private $id_linea;
    private $fecha;
    private $emociones;
    private $grado_intensidad;
    private $sensaciones_corporales;

    //obtener
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

    //borrar
    static function deleteById($link, $id) {
        try {
            $consulta = "DELETE FROM estado_animo WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id_registro, $id_linea, $fecha, $emociones, $grado_intensidad, $sensaciones_corporales) {
        $this->id_registro = $id_registro;
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->emociones = $emociones;
        $this->grado_intensidad = $grado_intensidad;
        $this->sensaciones_corporales = $sensaciones_corporales;
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
    public function setIdRegistro($id_registro) {
        $this->id_registro = $id_registro;
    }
    
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

    //añadir linea
    function insertar($link) {
        try {
            $consulta = "INSERT INTO `estado_animo` (`id_registro`, `id_linea`, `fecha`, `emociones`, `grado_intensidad`, `sensaciones_corporales`) 
                         VALUES (:id_registro, :id_linea, :fecha, :emociones, :grado_intensidad, :sensaciones_corporales)";
            $result = $link->prepare($consulta);
            // Enlaza los parámetros con los valores de la instancia actual
            $result->bindParam(":id_registro", $this->id_registro);
            $result->bindParam(":id_linea", $this->id_linea);
            $result->bindParam(":fecha", $this->fecha);
            $result->bindParam(":emociones", $this->emociones);
            $result->bindParam(":grado_intensidad", $this->grado_intensidad);
            $result->bindParam(":sensaciones_corporales", $this->sensaciones_corporales);
            $result->execute();
            return $result;
        } catch(PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }
    
}
?>
