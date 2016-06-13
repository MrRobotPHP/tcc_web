<?php

abstract class Conexao_sql {

	const user = "root";
	const pass = "";

	private static $instance = null;

	private static function conectar() {
		try {
			
			self::$instance = new PDO("mysql:host=localhost;dbname=banco_de_dados_tcc", self::user, self::pass);
			self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			echo $e -> getMessage();
		}

		return self::$instance;
	}

	protected static function getDB() {
		return self::conectar();
	}

}

?>