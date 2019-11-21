<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;
use Hackthon\Controller\Calcular;
use Respect\Validation\Validator as v;
 
class CalcularController
{
    private $serviceHistoricoDeCalculo;
    private $climate;
    private $calcular;

    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate,string $coluna)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
        $this->calcular = new Calcular;
    }

}