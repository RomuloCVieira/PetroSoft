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
        $historicoDeCalculo = new HistoricoDeCalculo;
        
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
        $gasolina = $input->prompt();

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
        $etanol = $input->prompt();

        $resultado = $this->calcular->calcular($gasolina,$etanol);

        $historicoDeCalculo->setResultado((float) $resultado[1]);
        $historicoDeCalculo->setPontuacao((int) 1);
        $historicoDeCalculo->setPrecoEtanol((float) $etanol);
        $historicoDeCalculo->setPrecoGasolina((float) $gasolina);
        $historicoDeCalculo->setIdCliente(( string) "123.375.479-30");
        
        $this->insert($historicoDeCalculo);
        $padding = $this->climate->padding(20);
        $padding->label($resultado[2])->result($resultado[1]);
        $this->climate->green($this->getSuccessMessage());

    }
    protected function insert(HistoricoDeCalculo $historicoDeCalculo) : void
    {
        $this->serviceHistoricoDeCalculo->insertResultadoService($historicoDeCalculo);
    }
    
}