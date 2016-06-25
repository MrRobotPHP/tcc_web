<?php

require_once "classes/conexao_sql.php";

class Funcionario extends Conexao_sql {

	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $funcao;
	private $tarefasPendentes;

	/* Método construtor */
	/*public function __construct($id) {
		$this -> setId($id);
	}*/

	/* Métodos GET e SET */
	public function getId() {
		return $this -> id;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function getNome() {
		return $this -> nome;
	}

	public function setNome($nome) {
		$this -> nome = $nome;
	}

	public function getEmail() {
		return $this -> email;
	}

	public function setEmail($email) {
		$this -> email = $email;
	}

	public function getTelefone() {
		return $this -> telefone;
	}

	public function setTelefone($telefone) {
		$this -> telefone = $telefone;
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

	public function getTarefasPendentes() {
		return $this -> tarefasPendentes;
	}

	public function setTarefasPendentes($tarefasPendentes) {
		$this -> tarefasPendentes = $tarefasPendentes;
	}

	/* Pega dados do funcionário logado */
	public function carregaDados() {
		$pdo = parent::getDB();
		
		$query1 = $pdo -> prepare("SELECT F.NOME AS NOME, C.DESCRICAO AS CARGO, F.EMAIL AS EMAIL, F.TELEFONE1 AS TELEFONE
								  FROM FUNCIONARIO F
								  INNER JOIN CARGO AS C ON F.CARGO = C.ID
								  WHERE F.ID = " . $this -> getId());
		$query1 -> execute();

		$dados1 = $query1 -> fetch(PDO::FETCH_OBJ);

		$this -> setNome($dados1 -> NOME);
		$this -> setFuncao($dados1 -> CARGO);
		$this -> setEmail($dados1 -> EMAIL);
		$this -> setTelefone($dados1 -> TELEFONE);

		$query2 = $pdo -> prepare("SELECT COUNT(STATUS) AS TPEND FROM TAREFA WHERE FUNCIONARIO = " . $this-> getId());
		$query2 -> execute();

		$dados2 = $query2 -> fetch(PDO::FETCH_OBJ);

		$this -> setTarefasPendentes($dados2 -> TPEND);
	}

	public function verificaNivel($idfunc) {
		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT NIVEL FROM FUNCIONARIO WHERE ID = " . $idfunc);
		$query -> execute();

		return $dados = $query -> fetch(PDO::FETCH_ASSOC);
	}

	public function editarFuncionario($id, $email, $telefone) {
		$pdo = parent::getDB();

		if (isset($_FILES['foto'])) {
			
			$ext = strtolower(substr($_FILES['foto']['name'], -4));
			$novoNome = date("Y.m.d-H.i.s") . "." . $ext;
			$dir = "foto_funcionario/";
			$res = move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome);
		}

		$query = $pdo -> prepare("UPDATE FUNCIONARIO SET EMAIL = '" . $email . "', TELEFONE1 = '" . $telefone . "' WHERE ID = " . $id);
		$query -> execute();

		echo "<script>alert('Dados alterados com sucesso!')</script>";
	}

	/*
	public function enviaFoto($id) {
		if(isset($_FILES['foto'])) {

			$ext = strtolower(substr($_FILES['foto']['name'], -4));
			$novoNome = date("Y.m.d-H.i.s") . $ext;
			$dir = "foto_funcionario/";

			$res = move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome);

			$pdo = parent::getDB();

			$query = $pdo -> prepare("UPDATE FUNCIONARIO SET FOTO = " . $res . " WHERE ID = " . $id);
			$query -> execute();
		}
	}
	*/

	public function resgataFoto($id) {
		$pdo = parent::getDB();

		$query = $pdo -> prepare("SELECT FOTO FROM FUNCIONARIO WHERE ID = " . $id);
		$caminho = $query -> execute();

		if ($caminho -> rowCount() == 0) {

			$caminho = print("foto_funcionario/foto_padrao.png");
		}

		return $caminho;
	}
}

?>