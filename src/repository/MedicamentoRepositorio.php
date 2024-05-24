<?php
declare(strict_types=1);


namespace Andre\Vac\repository;

use Andre\Vac\Entity\Medicamento;
use DateTime;
use Exception;
use PDO;

class MedicamentoRepositorio
{
    public function __construct(private PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function preparaObjeto($dado) : Medicamento
    {
        $data = new DateTime($dado['data']);
        $data_prox = new DateTime($dado['data_prox']);

        return new Medicamento(
            $dado['id'],
            $data,
            $dado['nome'],
            $dado['marca'],
            $dado['tipo'],
            $dado['quantidade_animais'],
            $data_prox);
    }

    public function all()
    {
        $sql = "SELECT * FROM medicamentos";
        $statement = $this->pdo->query($sql);
        $medicamento = $statement->fetchAll(PDO::FETCH_ASSOC);

        $medicamentosTratados = array_map(
            function($elemento)
            {
                return $this->preparaObjeto($elemento);
            }, $medicamento);

        return $medicamentosTratados;
    }

    public function add($medicamento)  
    {
        $sql = "INSERT INTO medicamentos (nome, marca, data, tipo, quantidade_animais, data_prox) 
        VALUES (:nome, :marca, :data, :tipo, :quantidade_animais, :data_prox)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':nome', $medicamento->getNome);
        $statement->bindValue(':marca', $medicamento->getMarca);
        $statement->bindValue(':data', $medicamento->getData);
        $statement->bindValue(':tipo', $medicamento->getTipo);
        $statement->bindValue(':quantidade_animais', $medicamento->getQuantidadeDeAnimais);
        $statement->bindValue(':data_prox', $medicamento->getDataProx);
        $statement->execute();
    }

    public function remove(int $id) 
    {
        $sql = "DELETE FROM medicamentos WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);

        try {
            if (! $statement->execute()) {
                throw new Exception("Erro ao tentar executar o statement");
            }
        } catch(Exception $e) {
            echo "Erro" . $e->getMessage();
        }
    }
}