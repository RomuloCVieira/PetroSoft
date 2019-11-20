<?php

declare(strict_types=1);

namespace Hackthon\Repository;

use PDO;

class ProdutoRepositoryDatabase implements ProdutoRepositoryInterface
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function getAll(): array
    {
        $stmt = $this->conexao->prepare("SELECT * FROM produto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}