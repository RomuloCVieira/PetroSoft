<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;
use Hackthon\Controller\Calcular;
use Hackthon\Entity\HistoricoDeCalculo as EntityHistoricoDeCalculo;
use Respect\Validation\Validator as v;
 
class CalcularController
{
    protected $serviceHistoricoDeCalculo;
    protected $climate;
    protected $calcular;
    protected $resultado;
    protected $gasolina;
    protected $etanol;
    protected $historicoDeCalculo;

    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate,string $coluna)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
        $this->calcular = new Calcular;
        $this->historicoDeCalculo = new EntityHistoricoDeCalculo;
    }

}