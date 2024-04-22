<?php
class Psicologo {
    private $id;
    private $nombre;
    private $apellidos;
    private $cop_num;
    private $email;
    private $pwd;
    private $rol;
    
    static function getAll($link){
        try {
            $consulta = "SELECT * FROM psicologo;";
            $result = $link->prepare($consulta);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }
    
    static function buscarPorId($link, $id) {
        try {
            $consulta = "SELECT * FROM psicologo WHERE id = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            $fila = $result->fetch(PDO::FETCH_ASSOC);
            if ($fila) {
                return new Psicologo($fila['id'], $fila['nombre'], $fila['apellidos'], $fila['cop_num'], $fila['email'], $fila['pwd'], $fila['rol']);
            } else {
                return null; // El psicólogo no fue encontrado
            }
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    function __construct($id, $nombre, $apellidos, $cop_num, $email, $pwd, $rol = false) { 
        $this->nombre = $nombre;
        $this->id = $id;
        $this->apellidos = $apellidos;
        $this->cop_num = $cop_num;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->rol = $rol;
    }

    function insertar ($link){
        try{
            $consulta="INSERT INTO psicologo (nombre, apellidos, cop_num, email, pwd, rol) VALUES (:nombre,:apellidos, :cop_num, :email,:pwd, false)";
            $result=$link->prepare($consulta);
            $result->bindParam(':nombre',$this->nombre);
            $result->bindParam(':apellidos',$this->apellidos);
            $result->bindParam(':cop_num',$this->cop_num);
            $result->bindParam(':email',$this->email);
            $result->bindParam(':pwd',$this->pwd);
            
            $result->execute();
            return $result;
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            echo ($dato);
            die();
        }
    }

    function editar($link){
        try {
            $consulta = "UPDATE psicologo SET `nombre` = :nombre, `apellidos` = :apellidos, `email` = :email 
                         WHERE `id` = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);
            $result->bindParam(':nombre', $this->nombre);
            $result->bindParam(':apellidos', $this->apellidos);
            $result->bindParam(':email', $this->email);
            $result->execute();
            return $result->rowCount();
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    
    function editarConPwd($link){
        try {
            $consulta = "UPDATE psicologo SET `nombre` = :nombre, `apellidos` = :apellidos, `email` = :email, `pwd` = :pwd 
                         WHERE `id` = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);
            $result->bindParam(':nombre', $this->nombre);
            $result->bindParam(':apellidos', $this->apellidos);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':pwd', $this->pwd);
            $result->execute();
            return $result->rowCount(); 
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function login ($link) {
        try {
            $consulta = "SELECT id, pwd, rol from psicologo
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
            $consulta="SELECT * FROM psicologo where cop_num='$this->cop_num'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function borrar($link) {
        try {
            $consulta = "DELETE FROM psicologo WHERE id = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);  
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getCopNum() {
        return $this->cop_num;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getRol() {
        return $this->rol;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setCopNum($cop_num) {
        $this->cop_num = $cop_num;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }
    
}
?>