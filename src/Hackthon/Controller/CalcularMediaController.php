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
        $this->climate->flank($this->getTitle());

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
        $response = $input->prompt();

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
        $response1 = $input->prompt();

        dump($response);
        dump($response1);
        \dump($this->calcular->calcular($response,$response1));

        $historico = $this->serviceHistoricoDeCalculo;
        $historico->
        $this->climate->green($this->getSuccessMessage());
    }
}