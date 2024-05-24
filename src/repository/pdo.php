<?php
use Andre\Vac\repository\ConexaoBancoDados;
use Andre\Vac\repository\MedicamentoRepositorio;
require_once "src/repository/ConexaoBancoDados.php";
require_once "src/repository/MedicamentoRepositorio.php";


$host = 'localhost';
$dbname = 'provac';
$usuario = 'root';
$senha = 'solito2003';
$pdo = new ConexaoBancoDados($host, $dbname,$usuario,$senha);
