<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\HistoricoDeCalculo;
use Respect\Validation\Validator as v;

abstract class AtualizaPreco extends AtualizaHistoricoDeCalculoController
{
    private $title;

    public function __invoke()
    {
        // O flankmétodo permite atrair um pouco mais de atenção para uma linha:
        $this->climate->flank($this->getTitle());
        // O brmétodo faz exatamente isso, insere uma quebra de linha:
        $this->climate->bleak();
        // return $this->serviceCliente->getNome();
        $this->coluna = $this->getColuna();
        $preco = $this->getPreco();
        // return um Cliente Entity
        $preco = $this->setPreco($preco);
        // ruturn $this->serviceCliente->update($cliente);
        $this->updatePreco($preco);
       //messagem na cor verde de sucesso
        $this->climate->green($this->getSuccessMessage());
    }
   
    abstract protected function getPreco() : HistoricoDeCalculo ;
    abstract protected function getTitle() : string;
    abstract protected function getSuccessMessage() : string;

    public function setPreco(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo
    {
        //entrada de Nome
        $input = $this->climate->input('Digite novo preco:');

        $input->accept(function($response) {
            
            $validate = v::numeric()
                            ->positive()    
                            ->validate($response);
            if (!$validate) {
                $this->climate->red('Valor Inválido');
            }
            return $validate;

         
        });
           //capturar valor e armazenar numa var
           $response = $input->prompt();
           $historicoDeCalculo->setPrecoEtanol((float) $response);
           return $historicoDeCalculo;

    }
    protected function updatePreco(HistoricoDeCalculo $historicoDeCalculo) : void
    {
        $this->serviceHistoricoDeCalculo->updatePrecoEtanolSevice($historicoDeCalculo,$this->coluna);
    }
}