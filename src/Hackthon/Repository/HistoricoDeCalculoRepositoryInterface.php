<?php 

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\HistoricoDeCalculo;

interface HistoricoDeCalculoRepositoryInterface
{
    public function getAll() : array;
    public function getById(int $idHitoricoDeCalculo) : HistoricoDeCalculo;
    public function updatePrecoEtanolDatabase(HistoricoDeCalculo $historicoDeCalculo,string $coluna) : HistoricoDeCalculo;
    public function insertResultadoDatabase(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo;


}