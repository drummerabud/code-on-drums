<?php

require_once '../menu.php';
require_once '../conexao.php';

$id_pessoa = $_GET['id_pessoa'];

?>

<!DOCTYPE html>
<html>

<head>

  <title>Buritizal CS - Editar Pessoas</title>

</head>

<body>

<div class="container mw-100" style="width: 550px">
  <h3 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Editar Pessoas</h3>

      <?php

      $sql="SELECT * FROM pessoas WHERE id_pessoa = $id_pessoa";
      $busca = mysqli_query($conexao, $sql);

      $array = mysqli_fetch_array($busca);
      $id_pessoa = $array['id_pessoa'];
      $nome = $array['nome'];
      $sobrenome = $array['sobrenome'];
      $cpf = $array['cpf'];
      $rg = $array['rg'];
      $logradouro = $array['logradouro'];
      $numero = $array['numero'];
      $complemento = $array['complemento'];
      $frentetrabalho = $array['frentetrabalho'];
      $bolsafamilia = $array['bolsafamilia'];
      $luzagua = $array['luzagua'];
      $outros = $array['outros'];
      $obspessoa = $array['obspessoa'];   
      
      ?>

    <form action="_atualizar_pessoas.php" method="post">

      <!--Inserir: é método "Post"-->

      <div class="form-group">

        <div class="my-1">
          <label>Nome</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $nome?>" autocomplete="off" required="">
          <input type="text" class="form-control" name="id_pessoa" value="<?php echo $id_pessoa?>" hidden>
        </div>

        <div class="my-1">
          <label>Sobrenome</label>
          <input type="text" class="form-control" name="sobrenome" value="<?php echo $sobrenome?>" autocomplete="off"
            required="">
        </div>

        <div class="form-group row">
          <div class="form-group col-md-6 my-1">
            <label>CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $cpf?>" autocomplete="off"
              required="">
          </div>
          <div class="form-group col-md-6 my-1">
            <label>RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $rg?>" autocomplete="off">
          </div>
        </div>

           <!--dropdown de logradouro -->
          <div class="form-group my-1">
            <label>Logradouro</label>

            <input type="text" class="form-control" value="<?php echo $logradouro?>" autocomplete="off"
              list="buscalogradouro" name="logradouro" required>
            <datalist class="w-75" id="buscalogradouro">
              
            <?php

          $sql = "SELECT logradouro FROM logradouro";
          $buscar = mysqli_query($conexao,$sql);

          while ($array = mysqli_fetch_array($buscar)){
          $logradouro = $array['logradouro'];

        ?>
              <option value="<?php echo $logradouro ?>">
                <?php } ?>
            </datalist>

          </div>

        <div class="form-group row">
          <div class="form-group col-md-6 my-1">
            <label>Número</label>
            <input type="text" class="form-control" name="numero" value="<?php echo $numero ?>" autocomplete="off"
              required="">
          </div>
          <div class="form-group col-md-6 my-1">
            <label>Complemento</label>
            <input type="text" class="form-control" name="complemento" value="<?php echo $complemento?>"
              autocomplete="off">
          </div>
        </div>


        <hr class="my-3" />

        <h5 class="text-center text-uppercase my-3 p-1 rounded bg-warning bg-gradient">Ajuda de Custos</h5>

        <div class="form-group row">

          <div class="form-group col-md-6 my-1">
            <label>Frente de Trabalho</label>
            <input type="text" class="form-control" id="frentetrabalho" name="frentetrabalho"
              value="<?php echo $frentetrabalho?>" autocomplete="off">
          </div>
          <div class="form-group col-md-6 my-1">
            <label>Bolsa Família</label>
            <input type="text" class="form-control" id="bolsafamilia" name="bolsafamilia"
              value="<?php echo $bolsafamilia ?>" autocomplete="off">
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-md-6 my-1">
            <label>Luz e Água</label>
            <input type="text" class="form-control" id="luzagua" name="luzagua" value="<?php echo $luzagua?>"
              autocomplete="off">
          </div>
          <div class="form-group col-md-6 my-1">
            <label>Outros</label>
            <input type="text" class="form-control" id="outros" name="outros" value="<?php echo $outros?>"
              autocomplete="off">
          </div>
        </div>

        <div class="my-1">
          <label>Observação</label>
          <input type="text" class="form-control" name="obspessoa" value="<?php echo $obspessoa?>" autocomplete="off">
        </div>

        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary">Atualizar</button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</button>
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
          Deseja EXCLUIR a pessoa:
          <?php echo $nome," ",$sobrenome ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <a href="_excluir_pessoas.php?id_pessoa=<?php echo $id_pessoa ?>"><button type="button"
              class="btn btn-danger">Excluir!</button></a>
        </div>
      </div>
    </div>
  </div>


  <!-- Source do Ajax -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <!-- Source de Máscara de Dinheiro -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>


  <!-- Colocando máscara nos inputs em JavaScript -->

  <script>

    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("00000000-0");

    $(function () {

      $("#frentetrabalho").maskMoney({
        thousands: '',
        decimal: '.'
      });
      $("#luzagua").maskMoney({
        thousands: '',
        decimal: '.'
      });
      $("#bolsafamilia").maskMoney({
        thousands: '',
        decimal: '.'
      });
      $("#outros").maskMoney({
        thousands: '',
        decimal: '.'
      });
    });

  </script>

</body>

</html>