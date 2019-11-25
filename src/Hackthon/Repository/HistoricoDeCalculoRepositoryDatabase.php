<?php

declare(strict_types=1);

namespace Hackthon\Repository;

use Exception;
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
    public function getPrecoAtualDatabase(): \Hackthon\Entity\HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("select * from historico_de_calculo ORDER BY data DESC LIMIT 1");
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, HistoricoDeCalculo::class);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function updatePrecoEtanolDatabase(\Hackthon\Entity\HistoricoDeCalculo $historicoDeCalculo,string $coluna): \Hackthon\Entity\HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("UPDATE historico_de_calculo SET $coluna = ? WHERE id = ?");
        $stmt->bindValue(1, $historicoDeCalculo->getPrecoEtanol());
        $stmt->bindValue(2, $historicoDeCalculo->getId());
        $stmt->execute();        
        return $historicoDeCalculo;
    }
    public function insertResultadoDatabase(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("   INSERT INTO historico_de_calculo(
                                                resultado,
                                                pontuacao,
                                                preco_gasolina,
                                                preco_etanol,
                                                idcliente
                                            )
                                            VALUES(
                                                :resultado,
                                                :pontuacao,
                                                :preco_gasolina,
                                                :preco_etanol,
                                                :idcliente
                                            )"
                                        );
        $stmt->bindValue(':resultado',$historicoDeCalculo->getResultado());
        $stmt->bindValue(':pontuacao',$historicoDeCalculo->getPontuacao());
        $stmt->bindValue(':preco_gasolina',$historicoDeCalculo->getPrecoGasolina());
        $stmt->bindValue(':preco_etanol',$historicoDeCalculo->getPrecoEtanol());
        $stmt->bindValue(':idcliente',$historicoDeCalculo->getIdCliente());
        $stmt->execute();
        return $historicoDeCalculo;
    }
    public function getCombustivel(string $coluna) :  array
    {
        $stmt = $this->conexao->prepare("SELECT
                                            $coluna,
                                            DATE_FORMAT(DATA, '%d/%m/%Y %H:%m:%s') as data_hora
                                        FROM
                                            historico_de_calculo
                                        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorDataDatabase($data) : ?HistoricoDeCalculo
    {
        $stmt = $this->conexao->prepare("SELECT *,DATE_FORMAT(data, '%d/%m/%Y') as date FROM historico_de_calculo WHERE DATE_FORMAT(data, '%Y-%m-%d') = :data ORDER BY data desc LIMIT 1 ");
        $stmt->bindValue(':data',"$data");
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, HistoricoDeCalculo::class);
        $stmt->execute();
        $fetch = $stmt->fetch();
        if(!$fetch){
            return null;
        }
        return $fetch;
    }
}
