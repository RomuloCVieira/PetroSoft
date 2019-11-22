<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Service\HistoricoDeCalculo;
use Hackthon\Entity\HistoricoDeCalculo as EntityHistoricoDeCalculo;
use Respect\Validation\Validator as v;

class ListarCombustivelPorData
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
        $input = $this->climate->input('Digite uma data:');
        $input->accept(function($response) {
            
            $validate = v::date('d/m/Y')  
                            ->validate($response);
            if (!$validate) {
                $this->climate->red('Formato de data Invalido!!');
            }
            return $validate;

         
        });
        $data = $input->prompt();
        $data = str_replace("/", "-", $data);
        $data = date('Y-m-d', strtotime($data));
        $historiocoPorData = $this->buscarPorData($data);
        dump($historiocoPorData);
        $this->climate->clear();
       
        $this->climate->flank('Busca efetuada com sucesso', '!');
        
        $this->climate->break();

        $padding = $this->climate->padding(20);
        $padding->label('Gasolina')->result($historiocoPorData->getPrecoGasolina());
        $padding->label('Etanol')->result($historiocoPorData->getPrecoEtanol());
        $padding->label('Resultado')->result($historiocoPorData->getResultado());

        $this->climate->break();

        if($historiocoPorData->getResultado() >= 0.7){
            $this->climate->green("Abasteça com Gasolina!!!");
        }else{
            $this->climate->green("Abasteça com Etanol!!!");
        }

        $this->climate->break();

    }
    protected function buscarPorData($data) : EntityHistoricoDeCalculo
    {
       return $this->serviceHistoricoDeCalculo->buscarPorDataService($data);
    }
}