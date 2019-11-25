<?php 

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\HistoricoDeCalculo;

interface HistoricoDeCalculoRepositoryInterface
{
    public function getAll() : array;
    public function getPrecoAtualDatabase() : HistoricoDeCalculo;
    public function updatePrecoEtanolDatabase(HistoricoDeCalculo $historicoDeCalculo,string $coluna) : HistoricoDeCalculo;
    public function insertResultadoDatabase(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo;
    public function getCombustivel(string $coluna) :  array;
    public function buscarPorDataDatabase($date) : ?HistoricoDeCalculo;
    
}