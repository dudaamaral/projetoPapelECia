<?php 
    require_once '../model/cliente.php';
    $objCli = new Cliente();

    if(isset($_POST['validar'])){
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        echo("Nome: ".$nome);

        if($objCli -> validar($nome, $cpf)){
            $objCli -> redirect('../view/cliente.php');
        }else{
            $objCli -> redirect('../acesso.html');
        }
    }
    if(isset($_POST['insert'])){

        $nome = $_POST["txtNome"];
        $cpf = $_POST["txtCpf"];
        $idade = $_POST["txtIdade"];
        $telefone = $_POST["txtTelefone"];
        if($objCli->inserir($nome, $cpf, $idade, $telefone)){
            $objCli -> redirect("../view/cliente.php");
        }
    }

    if(isset($_POST['mudar'])){
        $id = $_POST['mudar'];
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $idade = $_POST['txtIdade'];
        $telefone = $_POST['txtTelefone'];
        if($objCli-> mudar($nome, $cpf, $idade, $telefone, $id)){
           $objCli -> redirect ("../view/cliente.php");
        }
    }

    if(isset($_POST['apagar'])){
        $id = $_POST ['apagar'];
        if($objCli->apagar($id))
        {
            $objCli-> redirect ("../view/cliente.php");
        }
    }

?>