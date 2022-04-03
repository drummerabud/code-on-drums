<?php

require_once '../menu.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Buritizal CS - Cadastro de Logradouro</title>
</head>

<body>

  <div class="container mw-100" style="width: 550px">
    <h3 class="text-center text-uppercase my-4 p-3 bg-warning rounded">Cadastro de Logradouro</h3>

    <form action="_inserir_logradouro.php" method="post">

      <div class="form-group">

        <div class="my-1">
          <label>Logradouro</label>
          <input type="text" class="form-control" name="logradouro" placeholder="Logradouro" autocomplete="off"
            required="">
        </div>

        <div class="my-1">
          <label>Bairro</label>
          <input type="text" class="form-control" name="bairro" placeholder="Centro" autocomplete="off">
        </div>

        <div class="my-1">
          <label>CEP</label>
          <input type="text" class="form-control" name="cep" placeholder="14570-000" autocomplete="off">
        </div>

        <div class="my-1">
          <label>Tipo</label>

          <select class="form-select" name="tipo">
            <option selected value="Urbano">Urbano</option>
            <option value="Rural">Rural</option>
          </select>
        </div>

        <div class="my-1">
          <label>Observação</label>
          <input type="text" class="form-control" name="obs" placeholder="" autocomplete="off">
        </div>

        <div class="my-3 text-center">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
  </div>
</body>
</html>