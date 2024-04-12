<?php
class Comentario {
    private $id;
    private $id_psicologo;
    private $id_paciente;
    private $comentario;

    // Constructor
    public function __construct($id, $id_psicologo, $id_paciente, $comentario) {
        $this->id = $id;
        $this->id_psicologo = $id_psicologo;
        $this->id_paciente = $id_paciente;
        $this->comentario = $comentario;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdPsicologo() {
        return $this->id_psicologo;
    }

    public function getIdPaciente() {
        return $this->id_paciente;
    }

    public function getComentario() {
        return $this->comentario;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPsicologo($id_psicologo) {
        $this->id_psicologo = $id_psicologo;
    }

    public function setIdPaciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    static function getAllById($link, $id){
        try {
            $consulta = "SELECT c.*, p.nombre, p.apellidos  FROM comentario c
            inner join paciente p on p.id = c.id_paciente
            where c.id_psicologo = :id and c.visto = 0;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            echo $dato;
            die();
        }
    }

    static function getAllDeletedById($link, $id){
        try {
            $consulta = "SELECT c.*, p.nombre, p.apellidos  FROM comentario c
            inner join paciente p on p.id = c.id_paciente
            where c.id_psicologo = :id and c.visto = 1;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            echo $dato;
            die();
        }
    }

    function insertar($link) {
        try {
            $consulta = "INSERT INTO comentario (id_psicologo, id_paciente, comentario) VALUES (:id_psicologo, :id_paciente, :comentario);";
            $result = $link->prepare($consulta);
            $result->bindParam(':id_psicologo', $this->id_psicologo);
            $result->bindParam(':id_paciente', $this->id_paciente);
            $result->bindParam(':comentario', $this->comentario);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            echo $dato;
            die();
        }
    }

    function verRegistro($link){
        try {
            $consulta = "UPDATE comentario SET visto = 1 WHERE id = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            echo $dato;
            die();
        }
    }
}
?>
