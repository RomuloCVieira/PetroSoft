<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\HistoricoDeCalculo;

class AtualizaPrecoGasolina extends AtualizaPreco
{

    protected function getPreco() : HistoricoDeCalculo
    {
        return $this->serviceHistoricoDeCalculo->getPrecoService();
    }

    protected function getTitle() : string
    {
        return 'Calcular';
    }
    
    protected function getSuccessMessage() : string
    {
        return 'Calculo efetuado com sucesso';
    }
    protected function getColuna() : string
    {
        return $this->coluna;
    }

}