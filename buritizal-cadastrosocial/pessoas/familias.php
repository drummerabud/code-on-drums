<?php

require_once '../conexao.php';
require_once '../menu.php';

?>

<!DOCTYPE html>
<html>

<head>

  <title>Buritizal CS - Listar Família</title>

  <!-- Link Font Awesome -->

  <script src="https://kit.fontawesome.com/011e8368d2.js" crossorigin="anonymous"></script>

  <!-- Automatizar Pesquisa e Responsividade da Tabela -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

</head>

<body>

  <div class="container mw-75">
    <h2 class="text-center text-uppercase rounded my-4 p-3 bg-warning">Lista Família</h2>
    <table class="display nowrap mw-100" id="ListaFamilia">
      <thead>
        <tr>
          <th scope="col">Membros</th>
          <th scope="col">Endereço</th>
          <th scope="col">Frente de Trabalho</th>
          <th scope="col">Bolsa Família</th>
          <th scope="col">Luz / Água</th>
          <th scope="col">Outros</th>
          <th scope="col">Total</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>

      <?php
    
      $sql = "SELECT COUNT(nome) AS membros, endereco, SUM(frentetrabalho) AS total_frentetrabalho, SUM(bolsafamilia) AS total_bolsafamilia, SUM(luzagua) AS total_luzagua, SUM(outros) AS total_outros FROM pessoas GROUP BY endereco";
      $busca = mysqli_query($conexao, $sql);
      $id = 0;

      while($array = mysqli_fetch_array($busca)) {

       $membros = $array['membros'];
       $endereco = $array['endereco'];
       $frentetrabalho = $array['total_frentetrabalho'];
       $bolsafamilia = $array['total_bolsafamilia'];
       $luzagua = $array['total_luzagua'];
       $outros = $array['total_outros'];
       $total = $frentetrabalho + $bolsafamilia + $luzagua + $outros;
       $id = $id + 1;
                  
       ?>

      <tr>
        <td>
          <?php echo $membros ?>
        </td>
        <td>
          <?php echo $endereco ?>
        </td>
        <td>
          <?php echo $frentetrabalho ?>
        </td>
        <td>
          <?php echo $bolsafamilia ?>
        </td>
        <td>
          <?php echo $luzagua ?>
        </td>
        <td>
          <?php echo $outros ?>
        </td>
        <td>
          <?php echo $total ?>
        </td>
        <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
            data-bs-target="#myModal<?php echo $id ?>">
            Expandir</button>
        </td>
      </tr>

      <!-- Modal -->

      <div class="modal fade" id="myModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                <?php echo $endereco?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <?php

      //incluindo conexão ao banco de dados
      
      $sql2 = "SELECT * FROM pessoas WHERE endereco = '$endereco'";   
      $busca2 = mysqli_query($conexao, $sql2);

       while($array = mysqli_fetch_array($busca2)) {

      $n = $array['nome'];
      $s = $array['sobrenome'];
      $cpf = $array['cpf'];
      $rg = $array['rg'];
      $ft =$array['frentetrabalho'];
      $bf = $array['bolsafamilia'];
      $la = $array['luzagua'];
      $ou = $array['outros'];
      $obsp = $array['obspessoa']; 

      ?>

              <p><b>Nome Completo:</b> <?php echo $n,' ',$s ?></p>
              <p><b>CPF:</b> <?php echo $cpf?></p>
              <p><b>RG:</b> <?php echo $rg?></p>
              <p><b>Frente Trabalho:</b> <?php echo $ft?></p>
              <p><b>Bolsa Família:</b> <?php echo $bf?></p>
              <p><b>Luz e Água:</b> <?php echo $la?></p>
              <p><b>Outros:</b> <?php echo $ou?></p>
              <p><b>Observação:</b> <?php echo $obsp ?></p>
              <hr/>

              <?php } ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <?php } ?>

    </table>
  </div>

  <!--Plugin Filtro de Tabelas -->

  <script type="text/javascript">

    $(document).ready(function () {
      var table = $('#ListaFamilia').DataTable({
        responsive: true
      });

      new $.fn.dataTable.FixedHeader(table);
    });
  </script>

</body>

</html>