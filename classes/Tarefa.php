<?php

require_once "classes/Conexao_sql.php";

class Tarefa extends Conexao_sql {

	private $descricao;
	private $funcionario;
	private $evento;
	private $prazo;
	private $status;
	private $query;

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

		$query = $pdo -> prepare("SELECT T.DESCRICAO AS DESCRICAO, DATE_FORMAT(T.PRAZO, '%d/%m/%Y') AS PRAZO, E.DESCRICAO AS EVENTO, T.STATUS AS STATUS
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

}

?>