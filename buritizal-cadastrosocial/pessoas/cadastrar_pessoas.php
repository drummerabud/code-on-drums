<?php

require_once '../menu.php';
require_once '../conexao.php';

?>

<!DOCTYPE html>
<html>

<head>

  <title>Buritizal CS - Cadastro de Pessoas</title>

</head>

<body>
<div class="container mw-100" style="width: 550px">
<h3 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Cadastro de Pessoas</h3>

    <form action="_inserir_pessoas.php" method="post">

      <div class="form-group">
        <div class="my-1">
          <label>CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF" autocomplete="off">
          <button type="button" class="btn btn-primary btn-sm my-2" id="cpf_verificar">Verificar</button>
          <button type="button" class="btn btn-warning btn-sm my-2" id="cpf_alterar" onclick="alterarCPF()">Alterar</button>
          <span id="cpf_verificado"></span>
        </div>

        <div id="box" hidden>
          <div class="form-group my-1">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" autocomplete="off"
              required="" required="">
          </div>

          <div class="form-group my-1">
            <label>Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome"
              autocomplete="off" required="">
          </div>

          <div class="form-group my-1">
            <label>RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" autocomplete="off">
          </div>

          <div class="form-group my-1">
            <label>Logradouro</label>

            <input type="text" class="form-control" placeholder="Busca Logradouro" autocomplete="off"
              list="buscalogradouro" name="logradouro" id="logradouro" required>
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
              <input type="number" class="form-control" id="numero" name="numero" placeholder="Número"
                autocomplete="off" required="">
            </div>

            <div class="form-group col-md-6 my-1">
              <label>Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento"
                autocomplete="off">
            </div>
          </div>

          <hr class="my-3" />

          <h5 class="text-center text-uppercase my-3 p-1 rounded bg-warning bg-gradient">Ajuda de Custos</h5>

          <div class="form-group row my-1">
            <div class="form-group col-md-6">
              <label>Frente de Trabalho</label>
              <input type="text" class="form-control" id="frentetrabalho" name="frentetrabalho" placeholder=""
                autocomplete="off">
            </div>

            <div class="form-group col-md-6">
              <label>Bolsa Família</label>
              <input type="text" class="form-control" id="bolsafamilia" name="bolsafamilia" placeholder=""
                autocomplete="off">
            </div>
          </div>

          <div class="form-group row  my-1">
            <div class="form-group col-md-6">
              <label>Luz e Água</label>
              <input type="text" class="form-control" id="luzagua" name="luzagua" placeholder="" autocomplete="off">
            </div>

            <div class="form-group col-md-6">
              <label>Outros</label>
              <input type="text" class="form-control" id="outros" name="outros" placeholder="" autocomplete="off">
            </div>
          </div>

          <div class="form-group my-1">
            <label>Observação</label>
            <input type="text" class="form-control" id="obs" name="obs" placeholder="" autocomplete="off">
          </div>

          <div class="text-center my-2">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"
              onclick="confirmarPessoa()">Salvar</button>
            <!-- Modal -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Dados:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body fw-bold text-start">

                    <p>Nome: <span class="fw-normal" id="nome_confirmar"></span></p>
                    <p>Sobrenome: <span class="fw-normal" id="sobrenome_confirmar"></span></p>
                    <p>CPF: <span class="fw-normal" id="cpf_confirmar"></span></p>
                    <p>RG: <span class="fw-normal" id="rg_confirmar"></span></p>
                    <p>Logradouro: <span class="fw-normal" id="logradouro_confirmar">, </span>
                      <span class="fw-normal" id="numero_confirmar"> - </span>
                      <span class="fw-normal" id="complemento_confirmar"></span>
                    </p>
                    <hr />

                    <p>Frente de Trabalho: <span class="fw-normal" id="frentetrabalho_confirmar"></span></p>
                    <p>Bolsa Família: <span class="fw-normal" id="bolsafamilia_confirmar"></span></p>
                    <p>Lua e Água: <span class="fw-normal" id="luzagua_confirmar"></span></p>
                    <p>Outros: <span class="fw-normal" id="outros_confirmar"></span></p>
                    <p>Obs: <span class="fw-normal" id="obs_confirmar"></span></p>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Pessoa</button>
                  </div>
                </div>
              </div>
            </div>


          </div>


    </form>
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

    $("#cpf_verificar").on("click", function () {

      $.ajax({
        url: '_verificar_cpf.php',
        type: 'POST',
        data: { cpf: $("#cpf").val() },

        success: function (cpf) {
          $("#cpf_verificado").html(cpf);

        },
        error: function (cpf) {
          $("#cpf_verificado").html("Houve um erro ao carregar");
        }
      });
    });

    function alterarCPF() {

      let cpf = document.querySelector('#cpf');
      let box = document.querySelector('#box');
      let cpfVer = document.querySelector('#cpf_verificado');

      cpf.value = '';
      cpf.readOnly = false;
      cpf.focus();
      cpfVer.innerHTML = '';
      box.setAttribute('hidden', 'hidden');

    }

    function confirmarPessoa() {

      let nome = document.querySelector('#nome').value;
      let sobrenome = document.querySelector('#sobrenome').value;
      let cpf = document.querySelector('#cpf').value;
      let rg = document.querySelector('#rg').value;
      let logradouro = document.querySelector('#logradouro').value;
      let n = document.querySelector('#numero').value;
      let complemento = document.querySelector('#complemento').value;

      let frentetrabalho = document.querySelector('#frentetrabalho').value;
      let bolsafamilia = document.querySelector('#bolsafamilia').value;
      let luzagua = document.querySelector('#luzagua').value;
      let outros = document.querySelector('#outros').value;
      let obs = document.querySelector('#obs').value;

      document.querySelector('#nome_confirmar').innerHTML = nome;
      document.querySelector('#sobrenome_confirmar').innerHTML = sobrenome;
      document.querySelector('#cpf_confirmar').innerHTML = cpf;
      document.querySelector('#rg_confirmar').innerHTML = rg;
      document.querySelector('#logradouro_confirmar').innerHTML = logradouro;
      document.querySelector('#numero_confirmar').innerHTML = n;
      document.querySelector('#complemento_confirmar').innerHTML = complemento;

      document.querySelector('#frentetrabalho_confirmar').innerHTML = frentetrabalho;
      document.querySelector('#bolsafamilia_confirmar').innerHTML = bolsafamilia;
      document.querySelector('#luzagua_confirmar').innerHTML = luzagua;
      document.querySelector('#outros_confirmar').innerHTML = outros;
      document.querySelector('#obs_confirmar').innerHTML = obs;

    }

  </script>

</body>

</html>