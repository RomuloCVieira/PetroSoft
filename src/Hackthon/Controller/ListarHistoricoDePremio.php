<?php

declare(strict_types = 1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDePremio;

class ListarHistoricoDePremio
{
    private $climate;
    private $servicehistoricoDePremio;

    public function __construct(HistoricoDePremio $servicehistoricoDePremio,$climate)
    {
        $this->servicehistoricoDePremio = $servicehistoricoDePremio;
        $this->climate = $climate;
    }
    public function __invoke()
    {
        return $this->climate->table($this->servicehistoricoDePremio->getAll());
    }
}