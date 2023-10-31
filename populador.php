<?php

require 'data_generator.php';


$servername = "localhost";
$username = "root";
$password = "";
$database = "base_teste";
$table = 'clientes';
$columns = ['nome', 'sobrenome'];
$qtd = 500;

try {

	$sql = getSQL($columns, $table);
	$data = DataGenerator::getInsertData($qtd);
	logMsg("Inserindo " . count($data) . ' Registros');

	foreach ($data as $key => $value) {
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($sql);
		foreach ($data[$key] as $key => $value) {
			$stmt->bindParam(':' . $key, $value);
		}
		$stmt->execute();
	}
	logMsg("Registros Inseridos");
} catch (PDOException $e) {
	logMsg("Erro: " . $e->getMessage());
}

function logMsg(string $msg): void
{
	$now = new DateTime();
	echo "[{$now->format('d/m/Y H:i:s')}] " . $msg . "." . PHP_EOL;
}

function getSQL(array $columns, string $table): string
{
	$implodeColumns = implode(',', $columns);
	$bindColumns = getBind($columns);
	$stmt = "INSERT INTO $table ($implodeColumns) VALUES ($bindColumns)";
	return $stmt;
}

function getBind(array $columns, bool $inArray = false)
{
	if ($inArray == true) {

		foreach ($columns as $column) {
			$data[] = ':' . $column;
		}
		return  $data;
	} else {
		return ':' . implode(', :', $columns);
	}
}
