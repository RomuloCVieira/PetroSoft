<?php 

declare(strict_types=1);

namespace Hackthon\Repository;

interface HistoricoDeCalculoRepositoryInterface
{
    public function getAll() : array;
}