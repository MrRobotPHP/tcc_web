<?php

require_once "classes/Conexao_sql.php";

class Tarefa extends Conexao_sql {

	private $id;
	private $descricao;
	private $funcionario;
	private $evento;
	private $prazo;
	private $status;
	private $query;

	public function getId() {
		return $this -> id;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function getDescricao() {
		return $this -> descricao;
	}

	public function setDescricao($descricao) {
		$this -> descricao = $descricao;
	}

	public function getFuncionario() {
		return $this -> funcionario;
	}

	public function setFuncionario($funcionario) {
		$this -> funcionario = $funcionario;
	}

	public function getEvento() {
		return $this -> evento;
	}

	public function setEvento($evento) {
		$this -> evento = $evento;
	}

	public function getPrazo() {
		return $this -> prazo;
	}

	public function setPrazo($prazo) {
		$this -> prazo = $prazo;
	}

	public function getStatus() {
		return $this -> status;
	}

	public function setStatus($status) {
		$this -> status = $status;
	}

	public function getQuery() {
		return $this -> query;
	}

	public function setQuery($query) {
		$this -> query = $query;
	}

	/* Pega todas as tarefas ligadas ao funcionário logado */
	public function carregaTarefas() {
		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT T.ID AS ID, T.DESCRICAO AS DESCRICAO, DATE_FORMAT(T.PRAZO, '%d/%m/%Y') AS PRAZO, E.DESCRICAO AS EVENTO, T.STATUS 					   AS STATUS
								  FROM TAREFA T
								  INNER JOIN EVENTO AS E ON T.EVENTO = E.ID
								  INNER JOIN FUNCIONARIO AS F ON T.FUNCIONARIO = F.ID
								  WHERE T.STATUS = 0 AND F.ID = " . $this -> getFuncionario());

		$this -> setQuery($query);

		$query -> execute();

		//$this -> setDescricao($dadosTabela -> DESCRICAO);
		//$this -> setPrazo($dadosTabela -> PRAZO);
		//$this -> setEvento($dadosTabela -> EVENTO);
	}

	public function concluirTarefa($idtarefa, $dtInicio, $dtTermino, $hrInicio, $hrTermino) {
		$pdo = parent::getDB();

		$inicio = $dtInicio . " " . $hrInicio;
		$termino = $dtTermino . " " . $hrTermino;

		$query1 = $pdo -> prepare("SELECT E.ID AS EVENTO FROM TAREFA T INNER JOIN EVENTO AS E ON T.EVENTO = E.ID WHERE T.ID = " . $idtarefa);
		$query1 -> execute();
		$array = $query1 -> fetch(PDO::FETCH_ASSOC);
		$idEvento = $array["EVENTO"];

		$queryEvento = $pdo -> prepare("UPDATE EVENTO SET INICIO ='" . $inicio . "', TERMINO = '" . $termino . "' WHERE ID = " . $idEvento);
		$queryEvento -> execute();

		$queryTarefa = $pdo -> prepare("UPDATE TAREFA SET STATUS = 1 WHERE ID = " . $idtarefa);
		$queryTarefa -> execute();
	}

	public function concluirTarefaUsuarioComum($idtarefa) {
		$pdo = parent::getDB();

		$queryTarefa = $pdo -> prepare("UPDATE TAREFA SET STATUS = 1 WHERE ID = " . $idtarefa);
		$queryTarefa -> execute();
	}

	public function visualizarTarefasConcluidas($idfunc) {
		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT T.DESCRICAO AS DESCRICAO, E.DESCRICAO AS EVENTO, T.PRAZO AS PRAZO, F.ID
				  FROM TAREFA T
				  INNER JOIN EVENTO AS E ON T.EVENTO = E.ID
				  INNER JOIN FUNCIONARIO AS F ON T.FUNCIONARIO = F.ID
				  WHERE F.ID = " . $idfunc . " AND T.STATUS = 1");

		$this -> setQuery($query);

		$query -> execute();
	}

}

?>