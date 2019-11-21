<?php 

declare(strict_types=1);

namespace Hackthon\Entity;

class HistoricoDeCalculo
{
    private $id;
    private $resultado;
    private $pontuacao;
    private $idCliente;
    private $precoGasolina;
    private $precoEtanol;
    private $data;

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
    public function setPrecoGasolina(float $precoGasolina) : HistoricoDeCalculo
    {
        $this->precoGasolina = $precoGasolina;
        return $this;
    }
    public function setPrecoEtanol(float $precoEtanol) : HistoricoDeCalculo
    {
        $this->precoEtanol = $precoEtanol;
        return $this;
    }
    public function setData(date $data) : HistoricoDeCalculo
    {
        $this->data = $data;
        return $this;
    }
    public function getId() : int
    {
        return (int) $this->id;
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
    public function getPrecoGasolina() : float
    {
        return $this->precoGasolina;
    }
    public function getPrecoEtanol() : float
    {
        return $this->precoEtanol;
    }
    public function getData() : date
    {
        return $this->date;
    }
}