<?php

declare(strict_types=1);

namespace Hackthon\Service;

use Exception;
use Hackthon\Repository\HistoricoDeCalculoRepositoryInterface;
use Hackthon\Entity\HistoricoDeCalculo as EntityHistoricoDeCalculo;

class HistoricoDeCalculo 
{
    private $historicoDeCalculoRepositoryInterface;

    public function __construct(HistoricoDeCalculoRepositoryInterface $historicoDeCalculoRepositoryInterface)
    {
        $this->historicoDeCalculoRepositoryInterface = $historicoDeCalculoRepositoryInterface;
    }
    public function getAll()
    {
        return $this->historicoDeCalculoRepositoryInterface->getAll();
        // retornar o method getAll da interface
    }
    public function getPrecoService() : EntityHistoricoDeCalculo
    {
        return $this->historicoDeCalculoRepositoryInterface->getById(1);
    }
    public function updatePrecoEtanolSevice(EntityHistoricoDeCalculo $historicoDeCalculo,string $coluna) : EntityHistoricoDeCalculo
    {
        return $this->historicoDeCalculoRepositoryInterface->updatePrecoEtanolDatabase($historicoDeCalculo,$coluna);
    }
    public function insertResultadoService(EntityHistoricoDeCalculo $historicoDeCalculo) 
    {
        return $this->historicoDeCalculoRepositoryInterface->insertResultadoDatabase($historicoDeCalculo);
                                                             
    }
    public function getCombustivelService(string $coluna) : array
    {
        return $this->historicoDeCalculoRepositoryInterface->getCombustivel($coluna);
    }
    public function buscarPorDataService($data) : EntityHistoricoDeCalculo
    {
        if( $this->historicoDeCalculoRepositoryInterface->buscarPorDataDatabase($data) == null ){
            throw new Exception('Data não encontrada!!!');
        }
        return $this->historicoDeCalculoRepositoryInterface->buscarPorDataDatabase($data);
    }
}