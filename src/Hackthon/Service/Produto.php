<?php

declare(strict_types=1);

namespace Hackthon\Service;

use Hackthon\Entity\Produto as EntityProduto;
use Hackthon\Repository\ProdutoRepositoryInterface;
class Produto
{
    private $produtoRepository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }
    public function getAll()
    {
        return $this->produtoRepository->getAll();
    }
}

