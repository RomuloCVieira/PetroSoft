<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\Cliente;

class Controller
{
    protected $serviceCliente;
    protected $climate;

    public function __construct(Cliente $serviceCliente,$climate)
    {
        $this->serviceCliente = $serviceCliente;
        $this->climate = $climate;
        $this->climate->clear();
    }
}