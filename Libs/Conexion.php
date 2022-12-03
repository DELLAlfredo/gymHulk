<?php
    class Conexion{
        private $user = "root";
        private $pass = "";

        public function conectar(){
            return new PDO("mysql:host=localhost:3307;dbname=gym_hulk",$this->user,$this->pass);
        }
    }
?>