<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;

class ControllerHistoricoDeCalculo
{
    protected $serviceHistoricoDeCalculo;
    protected $climate;

    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
        $this->climate->clear();
    }
}