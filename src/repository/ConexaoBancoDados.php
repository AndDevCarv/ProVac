<?php
declare(strict_types=1);

namespace Andre\Vac\repository;

use PDO;
use Exception;
use PDOException;


class ConexaoBancoDados
{
    private $pdo;

    public function __construct($host, $dbname, $usuario, $senha)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception ("Erro ao conectar com banco de dados" . $e->getMessage());
        }
    }

    public function getPDO() : PDO 
    {
        return $this->pdo;
    }
}