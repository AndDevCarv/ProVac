<?php

declare(strict_types=1);

namespace Andre\Vac\Entity;

use DateTime;

class Medicamento
{
    private ?int $id;
    private DateTime $data;
    private string $nome;
    private string $marca;
    private string $tipo;
    private int $quantidade_animais;
    private ?DateTime $data_proxima_aplicacao;
    
    public function __construct(?int $id, DateTime $data, string $nome, 
    string $marca, string $tipo, int $quantidade_animais, ?DateTime $data_proxima_aplicacao)
    {
        $this->id = $id;
        $this->data = $data;
        $this->nome = $nome;
        $this->marca = $marca;
        $this->tipo = $tipo;
        $this->quantidade_animais = $quantidade_animais;
        $this->data_proxima_aplicacao = $data_proxima_aplicacao;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function getMarca() : string 
    {
        return $this->marca;    
    }

    public function getTipo() : string
    {
        return $this->tipo;
    }

    public function getQuantidadeDeAnimais() : int 
    {
        return $this->quantidade_animais;    
    }

    public function getDataProx() : DateTime
    {
        return $this->data_proxima_aplicacao;
    }

    public function dataProxForm() : string
    {
        return $this->getDataProx()->format('Y-m-d');   
    }

    public function getData() : DateTime
    {
        return $this->data;
    }

    public function dataForm() : string    
    {
        return $this->getData()->format('Y-m-d');    
    }
}
