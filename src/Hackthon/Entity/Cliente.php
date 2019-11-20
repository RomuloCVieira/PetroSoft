<?php

declare(strict_types=1);

namespace Hackthon\Entity;

class Cliente
{
    private $cpf;
    private $nome;

    public function setCpf(string $cpf) : Cliente
    {
        $this->cpf = $cpf;
        return $this;
    }
    public function setNome(string $nome) : Cliente
    {
        $this->nome = $nome;
        return $this;
    }
    public function getCpf() : string
    {
        return $this->cpf;
    }
    public function getNome() : string
    {
        return $this->nome;
    }
}