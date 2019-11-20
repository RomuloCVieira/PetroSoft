<?php

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\Cliente;

interface ClienteRepositoryInterface
{
    public function getAll() : array ;
    public function update(Cliente $cliente) : Cliente;
    public function getById(string $cpf) : Cliente;
}