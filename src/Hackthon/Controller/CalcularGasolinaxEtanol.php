<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\HistoricoDeCalculo;

class CalcularGasolinaxEtanol extends CalcularMediaController
{
    protected function getHistorico(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo
    {   
        $historicoDeCalculo->setResultado((float) $this->resultado[1]);
        $historicoDeCalculo->setPontuacao((int) 1);
        $historicoDeCalculo->setPrecoEtanol((float) $this->etanol);
        $historicoDeCalculo->setPrecoGasolina((float) $this->gasolina);
        $historicoDeCalculo->setIdCliente(( string) "123.375.479-30");
        return $historicoDeCalculo;
    }
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