<?php
    require_once '../model/produto.php';
    $objPro = new Produto();

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
    <h3>Estoque de Produtos</h3>
    <center>
    <a href=funcionario.php> <button type="button" class="btn btn-info btn-lg">Voltar</button> </a>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastrar Produto</button>
   </center> 
   <br>
   <br>
    </center> 
      <table class= "table table=striped">
<thead>
      <tr>
              <th>Id</th>
              <th>Descrição</th>
              <th>Quantidade</th>
              <th>Valor Unitário</th>
              <th>Editar</th>
              <th>Deletar</th>

          </tr>
          </thead>
          <tbody>
           <?php
           
           $query ="select * from produto";
           $stmt = $objPro -> runQuery($query);
           $stmt->execute();
           while($objPro = $stmt->fetch(PDO::FETCH_ASSOC)){
           ?>
           <center>
            <tr class="produto">
                   <td><?php echo($objPro['id']) ?></td>
                   <td><?php echo($objPro['descricao']) ?></td>
                   <td><?php echo($objPro['quantidade']) ?></td>
                   <td><?php echo($objPro['valor']) ?></td>

                   <td>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#myModalEditar"
                     data-id="<?php echo($objPro['id'])?>"
                     data-descricao="<?php echo($objPro['descricao']) ?>"
                     data-quantidade="<?php echo($objPro['quantidade']) ?>"
                     data-valor="<?php echo($objPro['valor']) ?>" >Editar</button> 
                     </td>

                    <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModalDel"
                    data-id="<?php echo($objPro['id'])?>"
                    data-descricao="<?php echo($objPro['descricao']) ?>" >Deletar</button> 
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
        <form action="../control/ctr-produto.php" method="POST">
    <input type="hidden" name="insert" >
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtDescricao" required>
    </div>
    <div class="form-group">
        <label for="">Quantidade</label>
        <input type="text" class="form-control" name="txtQuantidade" required>
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input type="text" class="form-control" name="txtValor" required>
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
        <form action="../control/ctr-produto.php" method="POST">
    <input type="hidden" name="editar" id="recipient-id">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtDescricao" id="recipient-descricao" required>
    </div>
    <div class="form-group">
        <label for="">Quantidade</label>
        <input type="text" class="form-control" name="txtQuantidade" id="recipient-quant" required>
    </div>
    <div class="form-group">
        <label for="">Valor</label>
        <input type="text" class="form-control" name="txtValor" id="recipient-valor" required>
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
        <form action="../control/ctr-produto.php" method="POST">
    <input type="hidden" name="deletar" id="recipient-id">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtDescricao" id="recipient-descricao" required>
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
     var recipientDescricao = button.data('descricao')
     var recipientQuantidade = button.data('quantidade')
     var recipientValor = button.data('valor')

     var modal = $(this)
     modal.find('#recipient-id').val(recipientId)
     modal.find('#recipient-descricao').val(recipientDescricao)
     modal.find('#recipient-quant').val(recipientQuantidade)
     modal.find('#recipient-valor').val(recipientValor)



    })
</script>

<script>


$('#myModalDel').on('show.bs.modal',function(event)
    {
     var button  = $(event.relatedTarget)
     var recipientId = button.data('id')
     var recipientDescricao = button.data('descricao')
  

     var modal = $(this)
     modal.find('#recipient-id').val(recipientId)
     modal.find('#recipient-descricao').val(recipientDescricao)
  })
  </script>

<script>
$a1 = $_POST ['txtQuantidade'];
$a2 = $_POST ['txtValor'];
$cal = $_POST['total'];

$cal = $a1 * $a2;


</script>


</body>
</html>