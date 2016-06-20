<?php

require_once "classes/Conexao_sql.php";
require_once "phplot/phplot.php";

class Grafico extends Conexao_sql {

	
	private $mes;

	public function getMes() {
		return $this -> mes;
	}

	public function setMes($mes) {
		$this -> mes = $mes;
	}

	public function alimentaGrafico() {

		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT COUNT(T.ID) AS TAREFAS, F.NOME AS FUNCIONARIO, DATE_FORMAT(PRAZO, '%m') AS MES
							      FROM TAREFA T
							      INNER JOIN FUNCIONARIO AS F ON T.FUNCIONARIO = F.ID
							      WHERE T.STATUS = 0");

		//$query = $pdo -> prepare("$linha = $query -> fetchAll(PDO::FETCH_ASSOC);");
		$query -> execute();

		while ($valor = $query -> fetchAll(PDO::FETCH_ASSOC)) {

			switch ($valor["MES"]) {
				case '01':
					$this -> setMes("Janeiro");
					break;
				
				case '02':
					$this -> setMes("Fevereiro");
					break;

				case '03':
					$this -> setMes("Março");
					break;

				case '04':
					$this -> setMes("Abril");
					break;

				case '05':
					$this -> setMes("Maio");
					break;

				case '06':
					$this -> setMes("Junho");
					break;

				case '07':
					$this -> setMes("Julho");
					break;

				case '08':
					$this -> setMes("Agosto");
					break;

				case '09':
					$this -> setMes("Setembro");
					break;

				case '10':
					$this -> setMes("Outubro");
					break;

				case '11':
					$this -> setMes("Novembro");
					break;

				case '12':
					$this -> setMes("Dezembro");
					break;
			}
		}
	}
}

?>