<?php

require_once 'conexao.php';

class Cliente{
    private $conn;

    public function __construct()
    {
        $dataBase = new dataBase();
        $db = $dataBase -> dbConecction();
        $this -> conn = $db;
    }

    public function inserir($nome, $cpf, $idade, $telefone){
        try{
            $sql = "insert into cliente(nome, cpf, idade, telefone)
            VALUES(:nome, :cpf, :idade, :telefone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nome",$nome);   
            $stmt->bindParam(":cpf",$cpf); 
            $stmt->bindParam(":idade",$idade);
            $stmt->bindParam(":telefone",$telefone);
            $stmt->execute();
            return $stmt;
    }
        catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }
        finally{
            $this->conn = null;
        }
    }

    public function validar ($nome, $cpf){
        try {
            $sql = "SELECT * FROM cliente WHERE nome = :nome and cpf = :cpf";
            $stmt =$this -> conn -> prepare($sql);
            $stmt -> bindParam(":nome", $nome);
            $stmt -> bindParam(":cpf", $cpf);
            $stmt -> execute();

            if($stmt -> rowCount() > 0){
                return true;
            }else{
                return false;
            } 
        } catch (PDOException $e) {
            echo("Error: ".$e -> getMessage());
        } finally {
            $this -> conn = null;
        }
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function redirect($url){
        header("Location: $url");
    }


    public function mudar($nome, $cpf, $idade, $telefone, $id){
        try{
             $sql = "UPDATE cliente SET nome = :nome, cpf = :cpf, idade= :idade, telefone = :telefone WHERE id= :id";
             $stmt = $this -> conn -> prepare($sql);
             $stmt -> bindParam (":nome", $nome);
             $stmt -> bindParam (":cpf", $cpf);
             $stmt -> bindParam (":idade", $idade);
             $stmt -> bindParam (":telefone", $telefone);
             $stmt -> bindParam (":id", $id);
             $stmt -> execute();

             return $stmt;





        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;
        }
   }

   public function apagar($id){
    try{
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt-> execute();
        
        return $stmt;
        
    }catch (PDOException $e){
        echo("Error: ".$e->getMessage());
    }finally{
        $this->conn = null;
    }
}


}


?>