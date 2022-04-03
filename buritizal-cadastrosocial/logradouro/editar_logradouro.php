<?php

require_once '../conexao.php';
require_once '../menu.php';

$id_logradouro = $_GET['id_logradouro'];

?>

<!DOCTYPE html>
<html>

<head>
  <title>Buritizal CS - Editar Logradouro</title>
</head>

<body>

<div class="container mw-100" style="width: 550px">  
  <h3 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Editar Logradouro</h3>

    <?php
 
      $sql="SELECT * FROM logradouro WHERE id_logradouro = $id_logradouro";
      $busca = mysqli_query($conexao, $sql);

      $array = mysqli_fetch_array($busca);

    	//coloca todos os campos da tabela clientes dentro do array

       //$id_logradouro = $array['id_logradouro'];
       $logradouro = $array['logradouro'];
       $bairro = $array['bairro'];
       $cep = $array['cep'];
       $tipo = $array['tipo'];
       $obs = $array['obs'];
       
?>

    <form action="_atualizar_logradouro.php" method="post">

      <div class="form-group">

        <div class="my-1">
          <label>Logradouro</label>
          <input type="text" class="form-control" name="id_logradouro" value="<?php echo $id_logradouro?>"
            autocomplete="off" required="" hidden>
          <input type="text" class="form-control" name="logradouro" value="<?php echo $logradouro?>" autocomplete="off"
            required="">
        </div>

        <div class="my-1">
          <label>Bairro</label>
          <input type="text" class="form-control" name="bairro" value="<?php echo $bairro ?>" autocomplete="off">
        </div>

        <div class="my-1">
          <label>CEP</label>
          <input type="text" class="form-control" name="cep" value="<?php echo $cep ?>" autocomplete="off">
        </div>

        <div class="my-1">

          <label>Tipo</label>
          <select class="form-select" name="tipo">

            <?php

          if ($tipo == "Urbano") { ?>
            <option selected value="Urbano">Urbano</option>
            <option value="Rural">Rural</option>

            <?php }else { ?>
            <option value="Urbano">Urbano</option>
            <option selected value="Rural">Rural</option>
            <?php }  ?>
          </select>
        </div>

        <div class="my-1">
          <label>Observação</label>
          <input type="text" class="form-control" name="obs" value="<?php echo $obs ?>" autocomplete="off">
        </div>


        <div class="my-3 text-center">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Excluir</button>
        </div>

    </form>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EXCLUIR</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja <span class="text-danger">EXCLUIR</span> logradouro:
          <?php echo $logradouro ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <a href="_excluir_logradouro.php?id_logradouro=<?php echo $id_logradouro ?>"><button type="button"
              class="btn btn-danger">Excluir!</button></a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>