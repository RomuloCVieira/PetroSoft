<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;

class ListarPrecoGasolinaAtual
{
    private $serviceHistoricoDeCalculo;
    private $climate;

    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate,string $coluna)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
    }
    // Parece ser semelhante a um construtor, mas, a diferença que é somente 
    // uma invocação, portanto, o objeto precisa ser instanciado previamente.
    //  É como se o objeto pudesse ser chamado inúmeras vezes como um método.
    public function __invoke()
    {
        $padding = $this->climate->padding(20);
        $padding->label('Gasolina')->result('R$ '. $this->serviceHistoricoDeCalculo->getPrecoService()->getPrecoGasolina());
    }
}