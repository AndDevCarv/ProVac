<?php
declare(strict_types=1);

use Andre\Vac\Entity\Medicamento;
use Andre\Vac\repository\ConexaoBancoDados;
use Andre\Vac\repository\MedicamentoRepositorio;
require_once "src/entity/Medicamento.php";
require_once "src/repository/ConexaoBancoDados.php";
require_once "src/repository/MedicamentoRepositorio.php";

if (isset($_POST['cadastro'])) {
    $medicamento = new Medicamento(null, $_POST['data'], $_POST['nome'], $_POST['marca'], 
    $_POST['tipo'], $_POST['quantidade_animais'], $_POST['data_prox']);

    $host = 'localhost';
    $dbname = 'provac';
    $usuario = 'root';
    $senha = 'solito2003';
    $pdo = new ConexaoBancoDados($host, $dbname,$usuario,$senha);

    $repositorio = new MedicamentoRepositorio($pdo->getPDO());
    $repositorio->add($medicamento);

    header("location: formulario.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProVac</title>
    <link rel="stylesheet" href="src/view/css/form.css">
</head>
<body>
    <main>
        <header class="cabecalho">
            <nav class="cabecalho menu">
                <a class="nav voltar" href="index.html">Inicio</a>
                <a class="nav painel-controle" href="painel-controle.php">Painel de controle</a>
                <a class="nav logoff">Sair</a>
            </nav>
        </header>
        <h1 class="titulo-form">Adicionar registro de uso</h1>
        <section class="conteiner-form">
            <form class="formulario" action="#" method="post">
                
                    <label for="idata-aplicacao">Data:</label>
                    <input type="date" name="data-aplicacao" id="idata-aplicacao" required>
                
                    <label for="inome-medicamento">Nome do medicamento:</label>
                    <input type="text" name="nome-medicamento" id="inome-medicamento" placeholder="Ex.: Agrovet Plus" required>
                
                    <label for="imarca-medicamento">Marca do medicamento:</label>
                    <input type="text" name="marca-medicamento" id="imarca-medicamento" placeholder="Ex.: Elanco">
                

                    <div class="conteiner-radio">
                        <a>Tipo do medicamento</a>
                        <div>
                            <label for="ml">Ml</label>
                            <input type="radio" name="tipo" id="ml" value="ml" checked>
                        </div>
                        <div>
                            <label for="mg">Mg</label>
                            <input type="radio" name="tipo" id="mg" value="ml">
                        </div>
                    </div>

            
                    <label for="iquantidade-animais">Quantidade de animais:</label>
                    <input type="number" name="quantidade-animais" id="iquantidade-animais" placeholder="Ex.: 30"required>
                
                    <label for="idata-prox">Data da próxima aplicação:</label>
                    <input type="date" name="data-prox" id="idata-prox">
                
                    <input name="cadastrar" type="submit" value="Enviar" class="botao-enviar">
                    <input type="reset" value="Limpar formulário" class="botao-limpar">
                
            </form>
        </section>
    </main>
</body>
</html>