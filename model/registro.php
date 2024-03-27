<?php 
    class Registro {
        private $id;
        private $id_tipo_reg;
        private $titulo;
        private $descripcion;

        function __construct($id, $id_tipo_reg, $titulo, $descripcion) {
            $this->id = $id;
            $this->id_tipo_reg = $id_tipo_reg;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
        }

        static function getLastRegistro($link) {
            try {
                $consulta = "SELECT * 
                FROM registro 
                WHERE id = (SELECT MAX(id) FROM registro);
                ;";
                $result = $link->prepare($consulta);
                $result->execute();
                return $result;
            }catch (PDOException $e) {
                $dato = $e->getMessage();
                die();
            }
        }

        static function getAllTipos($link) {
            try {
                $consulta = "SELECT * FROM tipo_registro;";
                $result = $link->prepare($consulta);
                $result->execute();
                return $result;
            }catch (PDOException $e) {
                $dato = $e->getMessage();
                die();
            }
        }
        static function getAll($link) {
            try {
                $consulta = "SELECT registro.id, registro.id_tipo_reg, tipo_registro.titulo, tipo_registro.descripcion
                FROM registro INNER JOIN tipo_registro ON registro.id_tipo_reg = tipo_registro.id;";
                $result = $link->prepare($consulta);
                $result->execute();
                return $result;
            }catch (PDOException $e) {
                $dato = $e->getMessage();
                die();
            }
        }

        function insertar($link) {
            try {
                $consulta = "INSERT INTO `psyconnect`.`registro` (`id_tipo_reg`) VALUES (:id_tipo_reg);";
                $result = $link->prepare($consulta);
                $result->bindParam(":id_tipo_reg", $this->id_tipo_reg);
                $result->execute();
                return $result;
            }catch(PDOException $e){
                $dato= "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        function buscarLinea($link) {
            try {
                switch ($this->id_tipo_reg) {
                    case 1: 
                        $consulta = "SELECT * FROM relajacion_muscular WHERE id_registro = :id;";
                        break;
                    case 2: 
                        $consulta = "SELECT * FROM pensamientos WHERE id_registro = :id;";
                        break;
                    case 3: 
                        $consulta = "SELECT * FROM estado_animo WHERE id_registro = :id;";
                        break;
                    case 4:
                        $consulta = "SELECT * FROM logros WHERE id_registro = :id;";
                        break;
                    case 5:
                        $consulta = "SELECT * FROM sensaciones_corporales WHERE id_registro = :id;";
                        break;
                    default:
                    return null;
                }
                $result = $link->prepare($consulta);
                $result->bindParam(':id', $this->id);
                $result->execute();
                return $result;
            }catch(PDOException $e){
                $dato= "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        function borrarPacienteRegistro($link) {
            try {
                $consulta = "DELETE FROM paciente_registro WHERE id_registro = :id";
                $result = $link->prepare($consulta);
                $result->bindParam(':id', $this->id);  
                $result->execute();
                return $result->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $dato = "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        function borrar($link) {
            try {
                $consulta = "DELETE FROM registro WHERE id = :id";
                $result = $link->prepare($consulta);
                $result->bindParam(':id', $this->id);  
                $result->execute();
                return $result->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $dato = "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

    }
?>