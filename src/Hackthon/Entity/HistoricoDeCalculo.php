<?php 

declare(strict_types=1);

namespace Hackthon\Entity;

class HistoricoDeCalculo
{
    private $id;
    private $resultado;
    private $pontuacao;
    private $idcliente;
    private $preco_gasolina;
    private $preco_etanol;
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
    public function setPrecoGasolina(float $preco_gasolina) : HistoricoDeCalculo
    {
        $this->preco_gasolina = $preco_gasolina;
        return $this;
    }
    public function setPrecoEtanol(float $precoEtanol) : HistoricoDeCalculo
    {
        $this->preco_etanol = $precoEtanol;
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
        return (float) $this->preco_gasolina;
    }
    public function getPrecoEtanol() : float
    {
        return (float) $this->preco_etanol;
    }
    public function getData() : date
    {
        return $this->date;
    }
}