<?php
class Paciente {
    private $id;
    private $id_psicologo;
    private $nombre;
    private $apellidos;
    private $dni;
    private $email;
    private $pwd;
    
    static function getAll($link){
        try {
            $consulta = "SELECT * FROM paciente;";
            $result = $link->prepare($consulta);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    static function verRegistrosAsignados($link, $id) {
        try {
            $consulta = "SELECT t.titulo, r.id, r.id_tipo_reg, t.descripcion FROM tipo_registro t 
            INNER JOIN registro r ON t.id = r.id_tipo_reg
            INNER JOIN paciente_registro pr ON pr.id_registro = r.id
            INNER JOIN paciente p ON p.id = pr.id_paciente
            WHERE p.id = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            return $result; 
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    static function getPacienteById($link, $id){
        try {
            $consulta = "SELECT * FROM paciente WHERE id = '$id'";
            $result = $link->prepare($consulta);
            $result->execute();
            return $result;
        }catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    static function getAllById($link, $id){
        try {
            $consulta = "SELECT * FROM paciente where id_psicologo = :id_psicologo;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id_psicologo',$id);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id, $id_psicologo, $nombre, $apellidos, $dni, $email, $pwd) { 
        $this->id = $id;
        $this->id_psicologo = $id_psicologo;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    function insertar ($link){
        try{
            $consulta="INSERT INTO paciente (id_psicologo, nombre, apellidos, dni, email, pwd) VALUES (:id_psicologo, :nombre, :apellidos, :dni, :email,:pwd)";
            $result=$link->prepare($consulta);
            $result->bindParam(':id_psicologo',$this->id_psicologo);
            $result->bindParam(':nombre',$this->nombre);
            $result->bindParam(':apellidos',$this->apellidos);
            $result->bindParam(':dni', $this->dni);
            $result->bindParam(':email',$this->email);
            $result->bindParam(':pwd',$this->pwd);
            
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
echo ( "¡Error!: " . $e->getMessage() . "<br/>");
            die();
        }
    }

    function login ($link) {
        try {
            $consulta = "SELECT id, pwd from paciente
            where id = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$this->id);
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    function buscar ($link){
        try{
            $consulta="SELECT * FROM paciente where dni='$this->dni'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function editar($link){
        try {
        $consulta = "UPDATE paciente SET `nombre` = :nombre, `apellidos` = :apellidos, `dni`=:dni `email` = :email 
        WHERE `id` = :id";
        $result = $link->prepare($consulta);
        $result->bindParam(':id',$this->id);
        $result->bindParam(':nombre',$this->nombre);
        $result->bindParam(':apellidos',$this->apellidos);
        $result->bindParam(':dni',$this->dni);
        $result->bindParam(':email',$this->email);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
        } 
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function buscarRegistro($link) {
        try {
            $consulta = "SELECT * FROM paciente_registro where id_paciente = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id); 
            $result->execute();
            return $result;
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function borrar($link) {
        try {
            $consulta = "DELETE FROM paciente WHERE id = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);  
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function asignarRegistro($link, $id_registro) {
        $fecha = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DD
        try {
            $consulta = "INSERT INTO paciente_registro (id_paciente, id_registro, fecha) VALUES (:id_paciente, :id_registro, :fecha)";
            $result = $link->prepare($consulta);
            $result->bindParam(':id_paciente', $this->id);
            $result->bindParam(':id_registro', $id_registro);
            $result->bindParam(':fecha', $fecha);
            $result->execute(); 
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    


}  

?>