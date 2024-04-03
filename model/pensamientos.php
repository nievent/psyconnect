<?php
class Pensamientos {
    private $id_registro;
    private $id_linea;
    private $fecha;
    private $que_ha_sucedido;
    private $que_he_pensado;
    private $como_me_he_sentido;
    private $que_he_hecho;

    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM pensamientos WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    static function deleteById($link, $id) {
        try {
            $consulta = "DELETE FROM pensamientos WHERE id_registro = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    // Constructor
    public function __construct($id_registro, $id_linea, $fecha, $que_ha_sucedido, $que_he_pensado, $como_me_he_sentido, $que_he_hecho) {
        $this->id_registro = $id_registro;
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->que_ha_sucedido = $que_ha_sucedido;
        $this->que_he_pensado = $que_he_pensado;
        $this->como_me_he_sentido = $como_me_he_sentido;
        $this->que_he_hecho = $que_he_hecho;
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

    public function getQueHaSucedido() {
        return $this->que_ha_sucedido;
    }

    public function getQueHePensado() {
        return $this->que_he_pensado;
    }

    public function getComoMeHeSentido() {
        return $this->como_me_he_sentido;
    }

    public function getQueHeHecho() {
        return $this->que_he_hecho;
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

    public function setQueHaSucedido($que_ha_sucedido) {
        $this->que_ha_sucedido = $que_ha_sucedido;
    }

    public function setQueHePensado($que_he_pensado) {
        $this->que_he_pensado = $que_he_pensado;
    }

    public function setComoMeHeSentido($como_me_he_sentido) {
        $this->como_me_he_sentido = $como_me_he_sentido;
    }

    public function setQueHeHecho($que_he_hecho) {
        $this->que_he_hecho = $que_he_hecho;
    }

    function insertar($link) {
        try {
            $consulta = "INSERT INTO `pensamientos` (`id_registro`, `id_linea`, `fecha`, `que_ha_sucedido`, `que_he_pensado`, `como_me_he_sentido`, `que_he_hecho`) 
                         VALUES (:id_registro, :id_linea, :fecha, :que_ha_sucedido, :que_he_pensado, :como_me_he_sentido, :que_he_hecho)";
            $result = $link->prepare($consulta);
            // Enlaza los parámetros con los valores de la instancia actual
            $result->bindParam(":id_registro", $this->id_registro);
            $result->bindParam(":id_linea", $this->id_linea);
            $result->bindParam(":fecha", $this->fecha);
            $result->bindParam(":que_ha_sucedido", $this->que_ha_sucedido);
            $result->bindParam(":que_he_pensado", $this->que_he_pensado);
            $result->bindParam(":como_me_he_sentido", $this->como_me_he_sentido);
            $result->bindParam(":que_he_hecho", $this->que_he_hecho);
            $result->execute();
            return $result;
        } catch(PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }
    
}
