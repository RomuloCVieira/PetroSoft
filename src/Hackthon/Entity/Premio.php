<?php

declare(strict_types=1);

namespace Hackthon\Entity;

class Premio
{
    private $idproduto;
    private $idHistoricoDeCalculo;

    public function setIdProduto(int $idproduto) : Premio
    {
        $this->idproduto = $idproduto;
        return $this;
    }
    public function setIdHistoricoDeCalculo(int $idHistoricoDeCalculo) : Premio
    {
        $this->idHistoricoDeCalculo = $idHistoricoDeCalculo;
        return $this;
    }
    public function getIdProduto() : int
    {
        return $this->idproduto;
    }
    public function getIdHistoricoDeCalculo() : int
    {
        return $this->idHistoricoDeCalculo;
    }
}