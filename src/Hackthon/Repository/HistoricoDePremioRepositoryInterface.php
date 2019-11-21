<?php

declare(strict_types=1);

namespace Hackthon\Repository;

interface HistoricoDePremioRepositoryInterface
{
    public function getAll() : array;
}