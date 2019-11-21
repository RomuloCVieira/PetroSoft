<?php

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\HistoricoDeCalculo;
use PDO;

class HistoricoDeCalculoRepositoryDatabase implements HistoricoDeCalculoRepositoryInterface
{
    private $conexao;
    
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function getAll(): array
    {
        $stmt = $this->conexao->prepare("SELECT * FROM historico_de_calculo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById(int $idHitoricoDeCalculo): \Hackthon\Entity\HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("select * from historico_de_calculo where id = ?");
        $stmt->bindValue(1, $idHitoricoDeCalculo);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, HistoricoDeCalculo::class);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update(\Hackthon\Entity\HistoricoDeCalculo $historicoDeCalculo): \Hackthon\Entity\HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("update historico_de_calculo set preco_etanol = ? where id = ?");
        $stmt->bindValue(1, $historicoDeCalculo->getPrecoEtanol());
        $stmt->bindValue(2, $historicoDeCalculo->getId());
        $stmt->execute();        
        return $historicoDeCalculo;
    }

}
