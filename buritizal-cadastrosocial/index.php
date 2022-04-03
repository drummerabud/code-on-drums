<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Cadastro social da cidade de Buritizal/SP">
	<meta lang="pt-br">
	<meta name="author" content="Felipe Abud">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Buritizal - Cadastro Social</title>

	<!-- CSS Bootstrap em CDN -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>

<body class="text-center">
    
	<main class="d-flex align-items-center vh-100"> 
	  <form class="w-100 mx-auto p-5 top-50" action="index1.php" method="post" style="max-width: 500px;">
		<img class="mb-4 w-50" src="./imagens/buritizal.png" alt="Brasão da cidade de Buritizal/SP">
			<h1 class="h3 mb-3 fw-normal">Cadastro Social</h1>
	
		<div class="form-floating">
		  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite o usuário" required>
		  <label for="floatingInput">Usuário</label>
		</div>
		<div class="form-floating">
		  <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
		  <label for="floatingPassword">Senha</label>
		</div>
	
		<button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
		<p class="mt-5 mb-3 text-muted">© 2021–2022</p>
	  </form>
	</main>

	<!--JS Bootstrap em CDN -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>

</body>

</html>