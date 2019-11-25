<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;

class AtualizaHistoricoDeCalculoController
{
    protected $serviceHistoricoDeCalculo;
    protected $climate;
    protected $coluna;
    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate,string $coluna)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
        $this->coluna = $coluna;
        $this->climate->clear();
    }
}