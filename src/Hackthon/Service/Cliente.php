<?php

declare(strict_types=1);

namespace Hackthon\Service;

use Hackthon\Repository\ClienteRepositoryInterface;
use Hackthon\Entity\Cliente as EntityCliente;

class Cliente
{

    private $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAll()
    {
        return $this->clienteRepository->getAll();
    }

    public function getCpf() : EntityCliente
    {
        return $this->clienteRepository->getById('cpf');
    }

    public function getNome() : EntityCliente
    {
        return $this->clienteRepository->getById('nome');
    }

    public function update(EntityCliente $cliente) : EntityCliente
    {
        return $this->clienteRepository->update($cliente);
    }
}