<?php

declare(strict_types=1);

namespace Hackthon\Service;

use Hackthon\Repository\HistoricoDeCalculoRepositoryInterface;

class HistoricoDeCalculo 
{
    private $historicoDeCalculoRepositoryInterface;

    public function __construct(HistoricoDeCalculoRepositoryInterface $historicoDeCalculoRepositoryInterface)
    {
        $this->historicoDeCalculoRepositoryInterface = $historicoDeCalculoRepositoryInterface;
    }
    public function getAll()
    {
        return $this->historicoDeCalculoRepositoryInterface->getAll();
        // retornar o method getAll da interface
    }
}