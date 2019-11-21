<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\Produto;

class ListarProdutoController
{
    private $serviceProduto;
    private $climate;

    public function __construct(Produto $serviceProduto, $climate,string $coluna)
    {
        $this->serviceProduto = $serviceProduto;
        $this->climate = $climate;
    }
    // Parece ser semelhante a um construtor, mas, a diferença que é somente 
    // uma invocação, portanto, o objeto precisa ser instanciado previamente.
    //  É como se o objeto pudesse ser chamado inúmeras vezes como um método.
    public function __invoke()
    {
        $this->climate->table($this->serviceProduto->getAll());
    }
}