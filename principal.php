<?php
	require_once "classes/Conexao_sql.php";
	require_once "classes/Login.php";

	session_start();

	if(isset($_GET['logout'])) {
		if($_GET['logout'] == "ok") {
			Login::deslogar();
		}
	}

	if (!isset($_SESSION['logado'])) {
		header("Location: index.php");
	}
	else {
		echo "Bem-vindo " . $_SESSION['usuario'];
	}

?>

<a href="principal.php?logout=ok">Logout</a>