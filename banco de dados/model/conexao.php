<?php
    class dataBase{
        private $userName = "root";
        private $senha = "";

        public $conn;

        public function dbConecction(){
            $this -> conn = null;
            try {
                $this -> conn = new PDO('mysql: host=localhost; dbname=projetopc', $this -> userName, $this -> senha);
                $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo("Error: ".$e ->getMessage());
            }
            return $this -> conn;
        }
    }
?>

    