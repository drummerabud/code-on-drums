<?php

include '../conexao.php';

$cpf = $_POST['cpf'];

// Se o cpf for vazio

if (empty($cpf)) { ?>
<span class="text-danger">DIGITE UM CPF</span>
<?php
return;
}

// Se o cpf conter menos que 14 caracteres

if(strlen($cpf) != 14) { ?>
<span class="text-danger">CPF INVÁLIDO</span>
<?php

} else {

$sql = "SELECT * FROM pessoas WHERE cpf = '$cpf'";
$busca = mysqli_query($conexao, $sql);

if (mysqli_num_rows($busca) > 0) { 

$array = mysqli_fetch_array($busca);

$nome = $array['nome'];
$sobrenome = $array['sobrenome'];
$endereco = $array['endereco'];
$rg = $array['rg'];
$complemento = $array['complemento'];
$frentetrabalho = $array['frentetrabalho'];
$bolsafamilia = $array['bolsafamilia'];
$luzagua = $array['luzagua'];
$outros = $array['outros'];
$obspessoa = $array['obspessoa'];

?>

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#cpf-cadastrado">
  CPF Cadastrado 
</button>

<!-- Modal -->

<div class="modal fade" id="cpf-cadastrado" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CPF Cadastrado <?php echo $cpf ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p><b>Nome:</b> <?php echo $nome, ' ',$sobrenome?></p>
        <p><b>Endereço:</b> <?php echo $endereco?></p>
        <p><b>Complemento:</b> <?php echo $complemento?></p>
        <p><b>RG:</b> <?php echo $rg?> </p>
        <p><b>Frente de Trabalho:</b> <?php echo $frentetrabalho?></p>
        <p><b>Bolsa Família:</b> <?php echo $bolsafamilia?></p>
        <p><b>Luz e Água:</b> <?php echo $luzagua?></p>
        <p><b>Outros:</b> <?php echo $outros?></p>
        <p><b>Observação:</b> <?php echo $obspessoa?></p>       
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php } 

  else { ?>

<script>

  document.getElementById('box').removeAttribute("hidden");
  document.getElementById('cpf').readOnly = true;

</script>


<?php }

} ?>