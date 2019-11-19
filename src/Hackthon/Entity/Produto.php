<?php

declare(strict_types=1);

namespace Hackthon\Entity;

class Produto 
{
    private $id;
    private $nome;
    private $qtde;

    public function setId(int $id) : Produto
    {
        $this->id = $id;
        return $this;
    }
    public function setNome(string $nome) : Produto
    {
        $this->nome = $nome;
        return $this;
    }
    public function setQtde(int $qtde) : Produto
    {
        $this->qtde = $qtde;
        return $this;
    }
    public function getId() : int
    {
        return $this->id;
    }
    public function getNome() : string
    {
        return $this->nome;
    }
    public function getQtde() : int 
    {
        return $this->qtde;
    }
}