<?php

declare(strict_types = 1);

namespace Hackthon\Repository;

use PDO;

class HistoricoDePremioRepositoryDatabase implements HistoricoDePremioRepositoryInterface
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function getAll(): array
    {
        $stmt = $this->conexao->prepare("SELECT * FROM premiacao");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna um array vindo da consulta
    }
}