<?php
	require_once "classes/Conexao_sql.php";
	require_once "classes/Login.php";
	require_once "classes/Funcionario.php";
	require_once "classes/Tarefa.php";

	session_start();

	if(isset($_GET['logout'])) {
		if($_GET['logout'] == "ok") {
			Login::deslogar();
		}
	}

	if (!isset($_SESSION['logado'])) {
		header("Location: index.php");
	}

	if (isset($_SESSION['id'])) {
		$funcionario = new Funcionario;
		$id = $_SESSION['id'];
		$funcionario -> setId($id);	

		$tarefa = new Tarefa;
		$tarefa -> setFuncionario($id);	
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stylesheet.css">

	

	<title>Photus Dashboard</title>
</head>
<body style="background-image: none">

	<div class="header-painel">
		<h3 style="font-family: Squared-Display, sans-serif; font-size: 90px; margin-top: 0px; display: inline-block; color: #fff">Dashboard</h3>
		<span style="display: inline-block; margin-right: -180px; font-family: Sansation-Bold; color: #fff"><?php echo "Bem-vindo(a) " . $_SESSION['usuario']; ?></span>
		<a href="principal.php"><img src="img/home.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 600px"></a>
		<a href="grafico.php"><img src="img/grafico.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 650px"></a>
		<a href="#"><img src="img/config.png" style="height: 30px; width: 30px; display: inline-block; position: relative; top: -2px; left: 700px"></a>
		<a href="principal.php?logout=ok"><img src="img/logout_branco.png" style="height: 30px; width: 30px; float: right; margin-top: 30px; margin-right: 17px; display: inline-block;" title="Logout"></a>
	</div>

	<div class="container">

		<div class="painel" style="top: 113px; left: 17px; width: 45%; padding-left: 20px">
			<h4 class="t-painel">Meus dados<h4>
			<table cellspacing="10px">
				<tr>
					<td><img src="img/teste_usuario.png" alt="Foto" style="width: 85px; height: 100px" /></td>
				</tr>
				<tr>
					<td><spam class="t-texto-painel">Nome</spam></td>
					<td><spam class="texto-painel"><?php $funcionario -> carregaDados($id);
														 print($funcionario -> getNome());
													?></spam></td>
				</tr>
				<tr>
					<td><spam class="t-texto-painel">Função</spam></td>
					<td><spam class="texto-painel"><?php $funcionario -> carregaDados($id);
														 print($funcionario -> getFuncao());
													?></spam></td>
				</tr>
				<tr>
					<td><spam class="t-texto-painel">Email</spam></td>
					<td><spam class="texto-painel"><?php $funcionario -> carregaDados($id);
														 print($funcionario -> getEmail());
													?></spam></td>
				</tr>
				<tr>
					<td><spam class="t-texto-painel">Telefone</spam></td>
					<td><spam class="texto-painel"><?php $funcionario -> carregaDados($id);
														 print($funcionario -> getTelefone());
													?></spam></td>
				</tr>
				<tr>
					<td><spam class="t-texto-painel">Tarefas pendentes</spam></td>
					<td><spam class="texto-painel"><?php $funcionario -> carregaDados($id);
														 print($funcionario -> getTarefasPendentes());
													?></spam></td>
				</tr>
			</table>			
		</div>

		<div class="painel" style="width: 45%; float: right; top: -270px; right: 10px;border: 1px solid rgb(0, 0, 0); box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.6); border-radius: 5px; padding: 0px 0px 0px 20px; height: 378px">
			<h4 class="t-painel">Tarefas</h4>

			<table style="border-spacing: 10px; margin-right: 0px">
				<tr>
					<td><spam class="t-texto-painel">Descrição</spam></td>
					<td><spam class="t-texto-painel">Evento</spam></td>
					<td><spam class="t-texto-painel">Prazo</spam></td>
				</tr>
				<?php
					$tarefa -> carregaTarefas($id);
				?>
			</table>
		</div>
	</div>
	

	<script src="rgraph/libraries/RGraph.common.core.js"></script>
    <script src="rgraph/libraries/RGraph.bar.js"></script>
</body>
</html>