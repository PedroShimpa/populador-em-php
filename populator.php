<?php

require 'env.php';
require 'data_generator.php';

class Populator
{
    public static function populate()
    {
        try {
            $data = (new DataGenerator(getenv('QTD')))->getInsertData();
            if (count($data) > 0) {

                $columns = array_keys($data[0]);
                $sql = self::getSQL($columns, getenv('TABLE'));
                self::logMsg("Inserindo " . count($data) . ' Registros');
                foreach ($data as $key => $value) {
                    $conn = new PDO("mysql:host=" . getenv('SERVER') . ";dbname=" . getenv('DATABASE'), getenv('USERNAME'), getenv('PASSWORD'));
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare($sql);
                    foreach ($data[$key] as $coluna => $valor) {
                        $stmt->bindParam(':' . $coluna, $valor);
                    }
                    $stmt->execute();
                }
                self::logMsg("Registros Inseridos");
            }
        } catch (PDOException $e) {
            self::logMsg("Erro: " . $e->getMessage());
        }
    }

    private static function getSQL(array $columns, string $table): string
    {
        $implodeColumns = implode(',', $columns);
        $bindColumns = self::getBind($columns);
        $stmt = "INSERT INTO $table ($implodeColumns) VALUES ($bindColumns)";
        return $stmt;
    }

    private static function getBind(array $columns, bool $inArray = false)
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

    private static function logMsg(string $msg): void
    {
        $now = new DateTime();
        echo "[{$now->format('d/m/Y H:i:s')}] " . $msg . "." . PHP_EOL;
    }
}
