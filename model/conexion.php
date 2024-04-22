<?php
//conexion bd
    class Bd    
    {
        private $link;
        function __construct()
        {
        
            try{
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT =>true);
                $this->link= new PDO("mysql:host=localhost;dbname=psyconnect", "root", "", $opciones);
            }
            catch(PDOException $e){
                $dato= "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        
        }
        
        function __get($var){
            return $this->$var;
        }
    }
    
?>