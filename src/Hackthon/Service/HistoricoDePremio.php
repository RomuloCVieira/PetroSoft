<?php

declare(strict_types=1);

namespace Hackthon\Service;

use Hackthon\Repository\HistoricoDePremioRepositoryInterface;

class HistoricoDePremio
{
    private $historicoDePremioRepository;

    public function __construct(HistoricoDePremioRepositoryInterface $historicoDePremioRepository)
    {
        $this->historicoDePremioRepository = $historicoDePremioRepository;
    }
    public function getAll()
    {
        return $this->historicoDePremioRepository->getAll();
    }
}