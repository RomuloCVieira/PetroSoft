<?php

declare(strict_types=1);

namespace Hackthon\Repository;

interface ProdutoRepositoryInterface
{
    public function getAll() : array;
}