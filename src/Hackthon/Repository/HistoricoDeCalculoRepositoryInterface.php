<?php 

declare(strict_types=1);

namespace Hackthon\Repository;

use Hackthon\Entity\HistoricoDeCalculo;

interface HistoricoDeCalculoRepositoryInterface
{
    public function getAll() : array;
    public function getById(int $idHitoricoDeCalculo) : HistoricoDeCalculo;
    public function update(HistoricoDeCalculo $historicoDeCalculo) : HistoricoDeCalculo;

}