<?php
    require_once '../model/funcionario.php';
    $objFunc = new Funcionario();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Papel & Cia </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
.texto{
        color: #3a2f4d;
    }
    .jumbotron{
        background-color: #ffb1bf;
    }
    h3,p{
        text-align: center;
    }
    .container{
        width: 60%;
        height: 60%;
        padding-top: 10px;
    }
    #item{
      float: left;
      width: 100px;

    }
    .btn-lg {
      background-color: #ffb1bf
    }

</style>
</head>
<body>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
  <a class="navbar-brand" href="index.html">P&C</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../sobre.html">Sobre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contato.html">Contato</a>
        </li>
    </ul>
        
    <ul class= "navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../acesso.html">Acesso Administrativo</a>
          </li>


    </ul>
  </div>
</nav>

    <div class="container">
      <br>
      <br>
      <br>
      <center> 
    <h3>Funcionários</h3>
  </center>
  <center>
    <a href=cliente.php> <button type="button" class="btn btn-info btn-lg">Clientes</button> </a>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar Funcionario</button>
    <a href =produto.php> <button type="button" class="btn btn-info btn-lg" >Estoque de Produtos</button> </a>
  </center>
  <br>
  
      <table class= "table table=striped">
<thead>
      <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Cpf</th>
              <th>Editar</th>
              <th>Deletar</th>

          </tr>
          </thead>
          <tbody>
           <?php
           
           $query ="select * from funcionario";
           $stmt = $objFunc -> runQuery($query);
           $stmt->execute();
           while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
           ?>
           <center>
            <tr class="funcionario">
                   <td><?php echo($objFunc['id']) ?></td>
                   <td><?php echo($objFunc['nome']) ?></td>
                   <td><?php echo($objFunc['cpf']) ?></td>

                   <td>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#myModalEditar"
                     data-id="<?php echo($objFunc['id'])?>"
                     data-nome="<?php echo($objFunc['nome']) ?>"
                     data-cpf="<?php echo($objFunc['cpf']) ?>"
                     data-login="<?php echo($objFunc['login']) ?>"
                     data-senha="<?php echo($objFunc['senha']) ?>">Editar</button> 
                     </td>

                    <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModalDel"
                    data-id="<?php echo($objFunc['id'])?>"
                    data-nome="<?php echo($objFunc['nome']) ?>" >Deletar</button> 
                    </td>
               </tr>
           </center>
            <?php
            }
            ?>
        </tbody>   
    </table>
    </div>
   <!-- Trigger the modal with a button -->

 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <center>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
          </center>
        <h4 class="modal-title">Cadastrar</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr-funcionario.php" method="POST">
    <input type="hidden" name="insert" >
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtNome" required>
    </div>
    <div class="form-group">
        <label for="">CPF</label>
        <input type="text" class="form-control" name="txtCpf" required>
    </div>
    <div class="form-group">
        <label for="">Login</label>
        <input type="text" class="form-control" name="txtLogin" required>
    </div>
    <div class="form-group">
        <label for="">Senha</label>
        <input type="text" class="form-control" name="txtSenha" required>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</section>

<!-- Modal -->
<div id="myModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <center>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
          </center>
        <h4 class="modal-title">Editar</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr-funcionario.php" method="POST">
    <input type="hidden" name="editar" id="recipient-id">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtNome" id="recipient-nome" required>
    </div>
    <div class="form-group">
        <label for="">CPF</label>
        <input type="text" class="form-control" name="txtCpf" id="recipient-cpf" required>
    </div>
    <div class="form-group">
        <label for="">Login</label>
        <input type="text" class="form-control" name="txtLogin" id="recipient-login" required>
    </div>
    <div class="form-group">
        <label for="">Senha</label>
        <input type="text" class="form-control" name="txtSenha" id="recipient-senha" required>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="myModalDel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <center>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
          </center>
        <h4 class="modal-title">Deletar Funcionário</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr-funcionario.php" method="POST">
    <input type="hidden" name="deletar" id="recipient-id">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtNome" id="recipient-nome" required>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

          </div>
          </div>
          </div>
          </div>




<script>
    $('#myModalEditar').on('show.bs.modal',function(event)
    {
     var button  = $(event.relatedTarget)
     var recipientId = button.data('id')
     var recipientNome = button.data('nome')
     var recipientCpf = button.data('cpf')
     var recipientLogin = button.data('login')
     var recipientSenha = button.data('senha')

     var modal = $(this)
     modal.find('#recipient-id').val(recipientId)
     modal.find('#recipient-nome').val(recipientNome)
     modal.find('#recipient-cpf').val(recipientCpf)
     modal.find('#recipient-login').val(recipientLogin)
     modal.find('#recipient-senha').val(recipientSenha)



    })
</script>

<script>


$('#myModalDel').on('show.bs.modal',function(event)
    {
     var button  = $(event.relatedTarget)
     var recipientId = button.data('id')
     var recipientNome = button.data('nome')
  

     var modal = $(this)
     modal.find('#recipient-id').val(recipientId)
     modal.find('#recipient-nome').val(recipientNome)
  })
  </script>




</body>
</html>