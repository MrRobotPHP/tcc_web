<?php

	include_once "classes/Funcionario.php";
	include_once "classes/Tarefa.php";

	$idtarefa = $_GET["idtarefa"];
	$idfunc = $_GET["idfunc"];

	$objFuncionario = new Funcionario;
	$objTarefa = new Tarefa;

	if($objFuncionario -> verificaNivel($idfunc) == 1) {
		$tarefa -> concluirTarefa($idtarefa);
		echo "<script> alert('Tarefa concluída com sucesso') </script>";
		header("Location: principal.php");
	}

?>