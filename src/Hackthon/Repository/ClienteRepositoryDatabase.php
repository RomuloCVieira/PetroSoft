<?php

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\Cliente;
use PDO;

class ClienteRepositoryDatabase implements ClienteRepositoryInterface
{
    private $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function add(Cliente $pessoa) : Cliente
    {
        $pessoa = "";
        return new Cliente();
    }
    public function getAll(): array
    {
        $stmt = $this->conexao->prepare("select * from cliente");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById(string $cpf): Cliente
    {
        $stmt = $this->conexao->prepare("select * from cliente where cpf = ?");
        $stmt->bindValue(1, $cpf);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Cliente::class);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update(\Hackthon\Entity\Cliente $cliente): \Hackthon\Entity\Cliente
    {
        $stmt = $this->conexao->prepare("update cliente set nome = ? where cpf = ?");
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getCpf());
        $stmt->execute();        
        return $cliente;
    }
}