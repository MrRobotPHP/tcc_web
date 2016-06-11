<?php

require_once "classes/conexao_sql.php";

class Funcionario extends Conexao_sql {

	private $nome;
	private $cpf;
	private $telefone;
	private $cargo; //
	private $funcao;
	private $idade;
	private $data_admissao;

	/* Métodos GET e SET */
	public function getNome() {
		return $this -> nome;
	}

	public function setNome($nome) {
		$this -> nome = $nome;
	}

	public function getCpf() {
		return $this -> cpf;
	}

	public function setCpf($cpf) {
		$this -> cpf = $cpf;
	}

	public function getTelefone() {
		return $this -> telefone;
	}

	public function setTelefone($telefone) {
		$this -> telefone = $telefone;
	}

	public function getCargo() {
		return $this -> cargo;
	}

	public function setCargo($cargo) {
		$this -> cargo = $cargo;
	}

	public function getFuncao() {
		return $this -> funcao;
	}

	public function setFuncao($funcao) {
		$this -> funcao = $funcao;
	}

	public function getIdade() {
		return $this -> idade;
	}

	public function setIdade($idade) {
		$this -> idade = $idade;
	}

	public function getDataAdm() {
		return $this -> data_admissao;
	}

	public function setDataAdm($data_admissao) {
		$this -> data_admissao = $data_admissao;
	}

	/* Pega os dados necessarios do banco e passa para o JavaScript */
	public static function alimentaGrafico() {
		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT e.data AS DATA, t.status FROM tarefa t INNER JOIN evento AS e ON e.id = t.id");
		$query -> execute();

		$array = $pdo -> fetchAll(PDO::FETCH_ASSOC);
		if($array["t.status"]); 
	}

}

?>