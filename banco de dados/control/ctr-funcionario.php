<?php 
    require_once '../model/funcionario.php';
    $objFunc = new Funcionario();

    if(isset($_POST['validar'])){
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        echo("Login: ".$login);

        if($objFunc -> validar($login, $senha)){
            $objFunc -> redirect('../view/funcionario.php');
        }else{
            $objFunc -> redirect('../index.html');
        }
    }
    if(isset($_POST['insert'])){

        $nome = $_POST["txtNome"];
        $cpf = $_POST["txtCpf"];
        $login = $_POST["txtLogin"];
        $senha = $_POST["txtSenha"];
        if($objFunc->inserir($nome,$cpf,$login,$senha)){
            $objFunc -> redirect("../view/funcionario.php");
        }
    }



    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        if($objFunc-> editar($nome, $cpf, $login, $senha, $id)){
           $objFunc -> redirect ("../view/funcionario.php");
        }
    }

    if(isset($_POST['deletar'])){
        $id = $_POST ['deletar'];
        if($objFunc->deletar($id))
        {
            $objFunc-> redirect ("../view/funcionario.php");
        }
    }

?>