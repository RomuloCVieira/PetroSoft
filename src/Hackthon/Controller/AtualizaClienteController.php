<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\Cliente;
use Respect\Validation\Validator as v;

abstract class AtualizaClienteController extends Controller
{
    private $title;

    public function __invoke()
    {
        // O flankmétodo permite atrair um pouco mais de atenção para uma linha:
        $this->climate->flank($this->getTitle());
        // O brmétodo faz exatamente isso, insere uma quebra de linha:
        $this->climate->bleak();
        // return $this->serviceCliente->getNome();
        $cliente = $this->getCliente();
        // return um Cliente Entity
        $cliente = $this->setCliente($cliente);
        // ruturn $this->serviceCliente->update($cliente);
        $this->updateCliente($cliente);
       //messagem na cor verde de sucesso
        $this->climate->green($this->getSuccessMessage());
    }
   
    abstract protected function getCliente() : Cliente;
    abstract protected function getTitle() : string;
    abstract protected function getSuccessMessage() : string;

    public function setCliente(Cliente $cliente) : Cliente
    {
        //entrada de Nome
        $input = $this->climate->input('Digite novo nome:');

        $input->accept(function($response) {
            
            $validate = v::stringType()->validate($response);
            if (!$validate) {
                $this->climate->red('Valor Inválido');
            }
            return $validate;

         
        });
           //capturar valor e armazenar numa var
           $response = $input->prompt();
           $cliente->setNome((string) $response);
           return $cliente;

    }
    protected function updateCliente(Cliente $cliente) : void
    {
        $this->serviceCliente->update($cliente);
    }
}