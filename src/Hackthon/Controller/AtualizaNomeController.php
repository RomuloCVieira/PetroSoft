<?php

declare(strict_types=1);

namespace Hackthon\Controller;

use Hackthon\Entity\Cliente;

class AtualizaNomeController extends AtualizaClienteController
{

    protected function getCliente() : Cliente
    {
        return $this->serviceCliente->getNome();
    }

    protected function getTitle() : string
    {
        return 'Atualizar Nome';
    }
    
    protected function getSuccessMessage() : string
    {
        return 'Nome atualizado com sucesso!!!';
    }

}