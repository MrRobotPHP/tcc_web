<?php
	require_once "classes/Conexao_sql.php";
	require_once "classes/Login.php";
	require_once "classes/Funcionario.php";
	require_once "classes/Tarefa.php";

	session_start();

	$session_id = $_GET['session'];

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

		<div class="painel" style="top: 110px; text-align: center">
			<h4 class="t-painel" style="padding-left: 10px; padding-right: 10px; margin: 0px 0px 10px 0px">Concluir tarefa</h4>

			<div class="form-edit">

				<form action="" name="edit_funcionario">
					<table style="text-align: justify; margin: 0px auto" cellspacing="0px" cellpadding="5px">
						<tr>
							<td><label class="lblEdit" for="dinicio">Data de início</label></td>
							<td><label class="lblEdit" for="dtermino">Data de término</label></td>
						</tr>
						<tr>
							<td><input class="frmEdit" type="text" name="dinicio" id="dinicio" placeholder="Data de início" required /></td>
							<td><input class="frmEdit" type="text" name="dtermino" id="dtermino" placeholder="Data de término" required /></td>
						</tr>
						<tr>
							<td><label class="lblEdit" for="hinicio">Hora de início</label></td>
							<td><label class="lblEdit" for="htermino">Hora de término</label></td>
						</tr>
						<tr>
							<td>
								<input class="frmEdit" type="text" name="hinicio" id="hinicio" placeholder="Hora de início" required />
							</td>
							<td>
								<input class="frmEdit" type="text" name="htermino" id="htermino" placeholder="Hora de término" required />
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="submit" name="salvaEdit" value="editar" id="btnEdit" style="margin-left: 0px">Salvar alterações</button>
							</td>
							<td>
								<button type="submit" class="submit" name="concluirTarefa" value="concluir" id="btnEdit" style="margin-left: 0px">Concluir tarefa</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		
		
		<div class="footer">
			<p class="texto-painel" style="display: block; top: 20px">&copy; Copyright PHOTUS - Todos os direitos reservados.</p>
		</div>

	</div>
	
</body>
</html>