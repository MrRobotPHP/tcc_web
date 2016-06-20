<?php
	
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

?>