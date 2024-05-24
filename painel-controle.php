<?php
use Andre\Vac\repository\MedicamentoRepositorio;
require_once "src/entity/Medicamento.php";
require_once "src/repository/ConexaoBancoDados.php";
require_once "src/repository/MedicamentoRepositorio.php";
require_once "src/repository/pdo.php";

$repositorio = new MedicamentoRepositorio($pdo->getPDO());
$dadosRepositorio = $repositorio->all();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProVac</title>
    <link rel="stylesheet" href="src/view/css/painel.css">
</head>
<body>
    <main>
        <header class="cabecalho">
            <nav class="cabecalho menu">
                <a class="nav" href="formulario.php">Adicionar registro</a>
                <a class="nav">Como funciona</a>
                <a class="nav" href="index.php">Sair</a>
                <a class="nav" href="index.php">Inicio</a>
            </nav>
        </header>

        <div class="conteiner-titulo">
            <h1>Visão geral</h1>
        </div>

        <div class="conteiner-painel-titulo">
            <h3>Últimas aplicações</h3>
        </div>

        <section class="conteiner-painel-recente">
            <?php foreach($dadosRepositorio as $repositorio):?>
                <div class="conteiner-painel-informacoes">
                    <div class="conteiner-informacoes">
                        <p>Aplicação mais recente: <?=$repositorio->dataForm();?> </p>
                        <p>Nome: <?=$repositorio->getNome()?></p>
                        <p>Marca do medicamento: <?=$repositorio->getMarca()?> </p>
                        <p>Tipo: <?=$repositorio->getTipo()?> </p>
                        <p>Quantidade de animais: <?=$repositorio->getQuantidadeDeAnimais()?> </p>
                        <p>Data da próxima aplicação: <?=$repositorio->dataProxForm();?> </p>
                        <p>ID: <?=$repositorio->getId()?></p>
                        <div class="conteiner-botoes">
                            <p>
                                <form action="excluir-produto.php" method="post">
                                    <input type="hidden" name="id" value =<?=$repositorio->getId()?>>
                                    <input type="submit" class="botao-excluir" value="Excluir">
                                </form>
                            </p>
                            <p>
                                <form action="editar-produto.php" method="post">
                                    <input type="submit" class="botao-editar" value="Editar">
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            
            <?php endforeach ?>
        </section>
    </main>
</body>
</html>