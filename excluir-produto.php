<?php
require_once "src/repository/pdo.php";
use Andre\Vac\repository\MedicamentoRepositorio;

$medicamentoRepositorio = new MedicamentoRepositorio($pdo->getPDO());
$medicamentoRepositorio->remove($_POST['id']);

header("Location: painel-controle.php");