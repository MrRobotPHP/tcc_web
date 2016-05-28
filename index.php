<?php

require_once "classes/conexao_sql.php";
require_once "classes/login.php";

session_start();

	if (isset($_POST['enviaLogin'])) {

		if (strtolower($_SERVER['REQUEST_METHOD']) === "post") {

			$usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_MAGIC_QUOTES);
			$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

			$login = new Login;
			$login -> setLogin($usuario);
			$login -> setSenha($senha);

			if ($login -> logar()) {
				header("Location: principal.php");
			}
			else {
				echo "<script>";
				echo 	"alert('Usuário ou senha incorretos!');";
				echo "</script>";
			}

		}
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stylesheet.css">

	<title>Photus - Login</title>
</head>
<body>
	<div class="container">
		<h3 class="header">Photus Login</h3>
	</div>

	<div class="container d-login">
		<div class="frm-login">
			<form name="login" method="post" action="">
				<label for="usuario">Usuário</label>
				<p><input type="text" name="usuario" id="usuario" placeholder="Usuário" required /></p>
				<label for="senha">Senha</label>
				<p><input type="password" name="senha" id="senha" placeholder="Senha" required /></p>
				<p><button type="submit" name="enviaLogin" value="login">Login</button></p>
			</form>
		</div>
	</div>
</body>
</html>