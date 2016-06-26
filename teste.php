<?php
	require_once "classes/Conexao_sql.php";

	$pdo = new PDO("mysql:host=localhost;dbname=tcc", "root", "root");
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $pdo -> prepare("SELECT FOTO FROM FUNCIONARIO WHERE ID = 7");
	$query -> execute();

	$array = $query -> fetch(PDO::FETCH_ASSOC);
	$valor = $array["FOTO"];

	var_dump($query -> rowCount());

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<img src="<?php  ?>" alt="" />

</body>
</html>
