<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\HistoricoDeCalculo;

class CalcularGasolinaxEtanol extends CalcularMediaController
{

    protected function getTitle() : string
    {
        return 'Calcular';
    }
    
    protected function getSuccessMessage() : string
    {
        return 'Calculo efetuado com sucesso!!!';
    }
    protected function getColuna() : string
    {
        return $this->coluna;
    }

}