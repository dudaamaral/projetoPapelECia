<?php 
    require_once '../model/produto.php';
    $objPro = new Produto();

    if(isset($_POST['insert'])){

        $descricao = $_POST["txtDescricao"];
        $quantidade = $_POST["txtQuantidade"];
        $valor = $_POST["txtValor"];
        if($objPro->inserir($descricao,$quantidade,$valor)){
            $objPro-> redirect("../view/produto.php");
        }
    }
 
    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $descricao = $_POST['txtDescricao'];
        $valor = $_POST['txtValor'];
        $quantidade = $_POST['txtQuantidade'];
        if($objPro-> editar($descricao, $quantidade, $valor, $id)){
           $objPro -> redirect ("../view/produto.php");
        }
    }

    if(isset($_POST['deletar'])){
        $id = $_POST ['deletar'];
        if($objPro->deletar($id))
        {
            $objPro-> redirect ("../view/produto.php");
        }
    }

?>