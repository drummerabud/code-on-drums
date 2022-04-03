<?php

require_once '../conexao.php';
require_once '../menu.php';

?>

<!DOCTYPE html>
<html>
<head>

	<title>Buritizal CS - Listar Pessoas</title>

  <!-- Link Font Awesome -->

  <script src="https://kit.fontawesome.com/011e8368d2.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Automatizar Pesquisa e Responsividade da Tabela -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href= "https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

</head>

<body>

<div class ="container mw-75">
    <h2 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Lista de Pessoas</h2>
    
    <table class="display nowrap" id="ListaPessoas">
      <thead>
        <tr>
          <th scope="col">Nome Completo</th>
          <th scope="col">CPF</th>
          <th scope="col">RG</th>
          <th scope="col">Logradouro</th>
          <!--<th scope="col">Complemento</th>-->
          <th scope="col">Frente de Trabalho</th>
          <th scope="col">Bolsa Família</th>
          <th scope="col">Luz / Água</th>
          <th scope="col">Outros</th>
          <th scope="col">Observação</th>
          <th scope="col" <?php if ($permissao == 1) { ?> hidden <?php } ?> >Ações</th>
        </tr>
      </thead>


      <?php

     
      $sql="SELECT * FROM pessoas";
      $busca = mysqli_query($conexao, $sql);

      while($array = mysqli_fetch_array($busca)) {

        $id_pessoa = $array['id_pessoa'];
       $nome = $array['nome'];
       $sobrenome = $array['sobrenome'];
       $cpf = $array['cpf'];
       $rg = $array['rg'];
       $logradouro = $array['logradouro'];
       $numero = $array['numero'];
       $endereco = $array['endereco'];
       //$complemento = $array['complemento'];
       $frentetrabalho = $array['frentetrabalho'];
       $bolsafamilia = $array['bolsafamilia'];
       $luzagua = $array['luzagua'];
       $outros = $array['outros'];
       $obspessoa = $array['obspessoa'];
      
       ?>
       
       <tr>
         <td><?php echo $nome, " ", $sobrenome ?></td>
         <td><?php echo $cpf ?></td>
         <td><?php echo $rg ?></td>
         <td><?php echo $endereco ?></td>
         <!--<td><?php echo $complemento ?></td>-->
         <td><?php echo $frentetrabalho ?></td>
         <td><?php echo $bolsafamilia ?></td>
         <td><?php echo $luzagua ?></td>
         <td><?php echo $outros ?></td>
         <td><?php echo $obspessoa ?></td>
         <td><a href="editar_pessoas.php?id_pessoa=<?php echo $id_pessoa ?>">
          <button type="button" class="btn btn-primary btn-sm" <?php if ($permissao == 1) { ?> hidden <?php } ?> >Editar</button></a></td> 
       </tr>

     <?php } ?>
   </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#ListaPessoas').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>

</body>
</html>