<?php
	require_once "classes/Conexao_sql.php";
	require_once "classes/Login.php";
	require_once "classes/Funcionario.php";
	require_once "classes/Tarefa.php";

	session_start();

	$session_id = session_id();

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
	<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />	

	<title>Photus Dashboard</title>
</head>
<body style="background-image: none;">

	<div class="header-painel">
		<img src="img/logo_photus_branco.png" style="position: relative; display: inline-block; width: 60px; height: 50px; top: 7px; left: 10px">

		<h3 class="t-header">Dashboard</h3>
		<span style="display: inline-block; margin-right: -180px; font-family: Gravity-Bold; color: #fff"><?php echo "Bem-vindo(a) " . $_SESSION['usuario']; ?></span>

		<a href="principal.php"><img src="img/home.png" class="icon-header" style="left: 380px"></a>
		<a href="grafico.php?session=<?php $session_id ?>"><img src="img/grafico.png" class="icon-header" style="left: 430px"></a>
		<a href="config.php"><img src="img/config.png" class="icon-header" style="left: 480px"></a>
		
		<a href="principal.php?logout=ok"><img src="img/logout_branco.png" class="icon-header" style="float: right; margin-top: 23px; margin-right: 17px;" title="Logout"></a>
	</div>

	<div class="container">

		<div class="painel" style="top: 108px; left: 10px; width: 45%; padding-left: 20px; height: 380px">
			<h4 class="t-painel" style="margin-top: 10px; margin-bottom: 10px; padding-left: 10px">Meus dados</h4>
			<table cellspacing="10px">
				<tr>
					<td><img src="img/teste_usuario.png" alt="Foto" style="width: 85px; height: 100px" /></td>
				</tr>
				<tr>
					<td><span class="t-texto-painel">Nome</span></td>
					<td>
						<span class="texto-painel">
						<?php $funcionario -> carregaDados();
							print($funcionario -> getNome());
						?>
						</span>
					</td>
				</tr>
				<tr>
					<td><span class="t-texto-painel">Função</span></td>
					<td>
						<span class="texto-painel">
							<?php $funcionario -> carregaDados($id);
								print($funcionario -> getFuncao());
							?>
						</span>
					</td>
				</tr>
				<tr>
					<td><span class="t-texto-painel">Email</span></td>
					<td>
						<span class="texto-painel">
							<?php $funcionario -> carregaDados($id);
								print($funcionario -> getEmail());
							?>
						</span>
					</td>
				</tr>
				<tr>
					<td><span class="t-texto-painel">Telefone</span></td>
					<td>
						<span class="texto-painel">
							<?php $funcionario -> carregaDados($id);
								print($funcionario -> getTelefone());
							?>
						</span>
					</td>
				</tr>
				<tr>
					<td><span class="t-texto-painel">Tarefas pendentes</span></td>
					<td>
						<span class="texto-painel">
							<?php $funcionario -> carregaDados($id);
								print($funcionario -> getTarefasPendentes());
							?>
						</span>
					</td>
				</tr>
			</table>			
		</div>

		<div class="painel" style="width: 50%; float: right; top: -272px; right: 10px; padding: 0px 0px 0px 0px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.6); border-radius: 5px">
			<h4 class="t-painel" style="padding-left: 10px; margin: 0px 0px 0px 0px">Tarefas<a href="tarefas_completas.php"><img src="img/tarefa_completa1.png" id="icon-tarefa-completa"></a></h4>

			<table class="tarefas" style="border-spacing: 10px; margin-right: 0px;">
				<tr>
					<td><span class="t-texto-painel">Descrição</span></td>
					<td><span class="t-texto-painel">Evento</span></td>
					<td><span class="t-texto-painel">Prazo</span></td>
				</tr>
				<?php
					$tarefa -> carregaTarefas();
					$query = $tarefa -> getQuery();
					$valor = $query -> fetchAll(PDO::FETCH_ASSOC);

					foreach($valor as $dado) {
				?>
				<tr>
					<td><span class="texto-painel"><?php print($dado["DESCRICAO"]) ?></span></td>
					<td><span class="texto-painel"><?php print($dado["EVENTO"]) ?></span></td>
					<td><span class="texto-painel"><?php print($dado["PRAZO"]) ?></span></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>

	<div class="footer">
		<p class="texto-painel">&copy; Copyright PHOTUS - Todos os direitos reservados.</p>
	</div>
</body>
</html>