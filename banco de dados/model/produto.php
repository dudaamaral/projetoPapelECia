<?php

require_once 'conexao.php';

class Produto{
    private $conn;

    public function __construct()
    {
        $dataBase = new dataBase();
        $db = $dataBase -> dbConecction();
        $this -> conn = $db;
    }

    public function inserir($descricao, $quantidade, $valor){
        try{
            $sql = "insert into produto(descricao, quantidade, valor) VALUES(:descricao, :quantidade, :valor)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":descricao",$descricao);   
            $stmt->bindParam(":quantidade",$quantidade); 
            $stmt->bindParam(":valor",$valor);

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

    public function validar ($descricao, $quantidade, $valor){
        try {
            $sql = "SELECT * FROM descricao :descricao, quantidade = :quantidade and valor = :valor";
            $stmt =$this -> conn -> prepare($sql);
            $stmt -> bindParam(":descricao", $descricao);
            $stmt -> bindParam(":quantidade", $quantidade);
            $stmt -> bindParam(":valor", $valor);
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


    public function editar($descricao, $quantidade, $valor, $id){
        try{
             $sql = "UPDATE produto SET descricao = :descricao, quantidade = :quantidade, valor= :valor WHERE id= :id";
             $stmt = $this -> conn -> prepare($sql);
             $stmt -> bindParam (":descricao", $descricao);
             $stmt -> bindParam (":quantidade", $quantidade);
             $stmt -> bindParam (":valor", $valor);
             $stmt -> bindParam (":id", $id);
             $stmt -> execute();

             return $stmt;





        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;
        }
   }


   public function deletar($id){
    try{
        $sql = "DELETE FROM produto WHERE id = :id";
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



    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function redirect($url){
        header("Location: $url");
    }
}
?>