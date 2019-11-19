<?php 

declare(strict_types=1);

namespace Hackthon\Entity;

class HistoricoDeCalculo
{
    private $id;
    private $resultado;
    private $pontuacao;
    private $idCliente;

    public function setId(int $id) : HistoricoDeCalculo
    {
        $this->id = $id;
        return $this;
    }
    public function setResultado(float $resultado) : HistoricoDeCalculo
    {
        $this->resultado = $resultado;
        return $this;
    }
    public function setPontuacao(int $pontuacao) : HistoricoDeCalculo
    {
        $this->pontuacao = $pontuacao;
        return $this;
    }
    public function setIdCliente(int $idCliente) : HistoricoDeCalculo
    {
        $this->idCliente = $idCliente;
        return $this;
    }
    public function getId() : int
    {
        return $this->id;
    }
    public function getResultado() : float
    {
       return $this->resultado;
    }
    public function getPontuacao() : int
    {
        return $this->pontuacao;
    }
    public function getIdCliente() : int 
    {
        return $this->idCliente;
    }
}