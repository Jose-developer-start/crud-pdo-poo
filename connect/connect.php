<?php

    class CONEXION{
        private $server = SERVER;
        private $user = USER;
        private $password = PASSWORD;
        private $database = DATABASE;
        private $conexion;

        public function __construct(){
            try{
                $stringServidor = "mysql:host=".$this->server.";dbname=".$this->database.";charset=utf8";
                $this->conexion = new PDO($stringServidor,$this->user,$this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //echo "<script>alert('Conectado')</script>";
            }catch(PDOException $error){
                die("ERROR EN ".$error->getMessage());
            }
        }

        public function connect(){
            return $this->conexion;
        }

        
    }

?>