<?php
class Paciente {
    private $id;
    private $id_psicologo;
    private $nombre;
    private $apellidos;
    private $dni;
    private $email;
    private $pwd;
    
    //listar
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

    //buscar a un paciente
    static function buscarPorId($link, $id) {
        try {
            $consulta = "SELECT * FROM paciente WHERE id = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $id);
            $result->execute();
            $fila = $result->fetch(PDO::FETCH_ASSOC);
            if ($fila) {
                return new Paciente($fila['id'], $fila['id_psicologo'], $fila['nombre'], $fila['apellidos'], $fila['dni'], $fila['email'], $fila['pwd']);
            } else {
                return null; // El psicólogo no fue encontrado
            }
        } catch (PDOException $e) {
            $dato = $e->getMessage();
            die();
        }
    }

    //ver sus registros
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

    //listar un paciente
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

    //un paciente de un psicologo
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

    //insertar
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

    //login
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

    //seleccionar nombre y mail
    function getMailPsicologo($link) {
        try {
            $consulta = "SELECT ps.nombre, ps.email from psicologo ps 
            inner join paciente p on ps.id = p.id_psicologo
            where p.id = :id;";
            $result = $link->prepare($consulta);
            $result->bindParam(':id',$this->id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }

    //un paciente
    function buscarById ($link){
        try{
            $consulta="SELECT * FROM paciente where id='$this->id'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }


    //un paciente por dni
    function buscar ($link){
        try{
            $consulta="SELECT * FROM paciente where dni='$this->dni'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }

    //editar en la bd
    function editar($link){
        try {
            $consulta = "UPDATE paciente SET `nombre` = :nombre, `apellidos` = :apellidos, `dni` = :dni, `email` = :email 
            WHERE `id` = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id);
            $result->bindParam(':nombre', $this->nombre);
            $result->bindParam(':apellidos', $this->apellidos);
            $result->bindParam(':dni', $this->dni);
            $result->bindParam(':email', $this->email);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }
    

    //editar la pwd
    function editarConPwd($link){
        try {
        $consulta = "UPDATE paciente SET `nombre` = :nombre, `apellidos` = :apellidos, `dni`=:dni, `email` = :email, `pwd` = :pwd
        WHERE `id` = :id";
        $result = $link->prepare($consulta);
        $result->bindParam(':id',$this->id);
        $result->bindParam(':nombre',$this->nombre);
        $result->bindParam(':apellidos',$this->apellidos);
        $result->bindParam(':dni',$this->dni);
        $result->bindParam(':email',$this->email);
        $result->bindParam(':pwd',$this->pwd);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
        } 
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


//buscar en la tabla intermedia
    function buscarRegistro($link) {
        try {
            $consulta = "SELECT * FROM paciente_registro where id_paciente = :id";
            $result = $link->prepare($consulta);
            $result->bindParam(':id', $this->id); 
            $result->execute();

            if ($result->rowCount() === 0) {
                return null;
            }
            
            return $result;
        } catch(PDOException $e) {
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
//borrar
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

    //asignar registro
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
    
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdPsicologo() {
        return $this->id_psicologo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPwd() {
        return $this->pwd;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPsicologo($id_psicologo) {
        $this->id_psicologo = $id_psicologo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }
}
 

?>