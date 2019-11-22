<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;

class ListarListaEtanol
{
    private $serviceHistoricoDeCalculo;
    private $climate;
    private $coluna;

    public function __construct(HistoricoDeCalculo $serviceHistoricoDeCalculo,$climate,string $coluna)
    {
        $this->serviceHistoricoDeCalculo = $serviceHistoricoDeCalculo;
        $this->climate = $climate;
        $this->coluna = $coluna;
    }
    // Parece ser semelhante a um construtor, mas, a diferença que é somente 
    // uma invocação, portanto, o objeto precisa ser instanciado previamente.
    //  É como se o objeto pudesse ser chamado inúmeras vezes como um método.
    public function __invoke()
    {
        $this->climate->table($this->serviceHistoricoDeCalculo->getCombustivelService($this->coluna));
    }
}