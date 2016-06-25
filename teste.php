<?php
	/*	
	require_once "classes/Conexao_sql.php";
	require_once "phplot/phplot.php";
	require_once "classes/Grafico.php";

	$grafico = new Grafico;

	$grafico -> alimentaGrafico();

	$dados = array(
				array('Janeiro', 5),
				array('Fevereiro', 7),
				array('Março', 2),
				array('Abril', 6),
				array('Maio', 9),
				array('Junho', 8)
			 );

	$grafico = new PHPlot;

	$grafico -> SetDataValues($dados);
	$grafico -> SetPlotType("area");
	$grafico -> DrawGraph();
	*/

	/*
	if (isset($_POST['enviar'])) {

		if (isset($_FILES['foto'])) {
			
			$ext = strtolower(substr($_FILES['foto']['name'], -4));
			$novoNome = date("Y.m.d-H.i.s") . $ext;
			$dir = "foto_funcionario/";
			$res = move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome);
			var_dump($novoNome);
		}
	}
	*/

	$pdo = new PDO("mysql:host=localhost;dbname=tcc", "root", "root");
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $pdo -> prepare("SELECT FOTO FROM FUNCIONARIO WHERE ID = 7");
	$caminho = $query -> execute();

	if ($query -> rowCount() != 0) {

		$caminho = print("foto_funcionario/foto_padrao.png");
	}
?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<form action="" name="enviarFoto" method="post" enctype="multipart/form-data">
	<input type="file" name="foto">
	<input type="submit" name="enviar" value="Enviar">
</form>
	
</body>
</html>
-->