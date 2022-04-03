<?php

require_once '../conexao.php';
require_once '../menu.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Buritizal CS - Listar Logradouro</title>


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

	<div class ="container my-3 mw-75">
    <h2 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Lista de Logradouro</h2>
    <table class="display nowrap mw-100" id="ListaLogradouro">
      <thead>
        <tr>
          <th scope="col">Logradouro</th>
          <th scope="col">Bairro</th>
          <th scope="col">CEP</th>
          <th scope="col">Tipo</th>
          <th scope="col">Obs</th>
          <th scope="col" <?php if ($permissao == 1) { ?> hidden <?php } ?> >Ações</th>
        </tr>
      </thead>


      <?php

      //incluindo conexão ao banco de dados
   
      $sql="SELECT * FROM logradouro";
      $busca = mysqli_query($conexao, $sql);

      while($array = mysqli_fetch_array($busca)) {


       $id_logradouro = $array['id_logradouro']; 
       $logradouro = $array['logradouro'];
       $bairro = $array['bairro'];
       $cep = $array['cep'];
       $tipo = $array['tipo'];
       $obs = $array['obs'];
       
       ?>
       
       <tr>
         <td><?php echo $logradouro ?></td>
         <td><?php echo $bairro ?></td>
         <td><?php echo $cep ?></td>
         <td><?php echo $tipo ?></td>
         <td><?php echo $obs ?></td>
         <td><a href="editar_logradouro.php?id_logradouro=<?php echo $id_logradouro ?>">
          <button type="button" class="btn btn-primary btn-sm" 
          <?php if ($permissao == 1) { ?> hidden <?php } ?> >Editar</button></a></td> 
       </tr>

     <?php } ?>
   </table>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#ListaLogradouro').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>



</body>
</html>