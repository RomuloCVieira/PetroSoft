<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\HistoricoDeCalculo;
use Respect\Validation\Validator as v;

abstract class CalcularMediaController extends CalcularController
{
    // Parece ser semelhante a um construtor, mas, a diferença que é somente 
    // uma invocação, portanto, o objeto precisa ser instanciado previamente.
    //  É como se o objeto pudesse ser chamado inúmeras vezes como um método.
    public function __invoke()
    {        
        $this->climate->flank('Calcular');

        $input = $this->climate->input('Valor da Gasolina!!!');
        $input->accept(function($response) {
            
            $validate = v::numeric()
                            ->positive()    
                            ->validate($response);
            if (!$validate) {
                $this->climate->red('Valor Inválido');
            }
            return $validate;

         
        });
        $this->gasolina = $input->prompt();

        $input = $this->climate->input('Valor da Etanol!!!');
        $input->accept(function($response) {
            
            $validate = v::numeric()
                            ->positive()    
                            ->validate($response);
            if (!$validate) {
                $this->climate->red('Valor Inválido');
            }
            return $validate;
        
        });
        $this->etanol = $input->prompt();

        $this->resultado = $this->calcular->calcular($this->gasolina,$this->etanol);

        $this->insert();

        $padding = $this->climate->padding(20);
        $padding->label($this->resultado[2])->result($this->resultado[1]);
        
        $this->climate->green($this->getSuccessMessage());

    }
    protected function insert() : void
    {   
        $historicoDeCalculo = $this->getHistorico($this->historicoDeCalculo);
        $this->serviceHistoricoDeCalculo->insertResultadoService($historicoDeCalculo);
    }
    
}