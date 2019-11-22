<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Hackthon\Database\MysqlPDO;
use Hackthon\Controller\ListarClienteController;
use Hackthon\Controller\ListarProdutoController;
use Hackthon\Controller\ListarHistoricoDeCalculo;
use Hackthon\Controller\ListarHistoricoDePremio;
use Hackthon\Controller\AtualizaPrecoEtanol;
use Hackthon\Controller\AtualizaNomeController;
use Hackthon\Controller\AtualizaPrecoGasolina;
use Hackthon\Controller\CalcularGasolinaxEtanol;
use Hackthon\Controller\ListarCombustivelPorData;
use Hackthon\Controller\ListarListaEtanol;
use Hackthon\Controller\ListarListaGasolina;
use Hackthon\Controller\ListarPrecoEtanolAtual;
use Hackthon\Controller\ListarPrecoGasolinaAtual;
use Hackthon\Repository\ClienteRepositoryDatabase;
use Hackthon\Repository\HistoricoDeCalculoRepositoryDatabase;
use Hackthon\Repository\HistoricoDePremioRepositoryDatabase;
use Hackthon\Repository\ProdutoRepositoryDatabase;
use Hackthon\Service\Cliente;
use Hackthon\Service\HistoricoDeCalculo;
use Hackthon\Service\Produto;
use Hackthon\Service\HistoricoDePremio;

$conexao = new MysqlPDO(json_decode(file_get_contents("./config/connection.json")));
$clienteRepositoryDatabase  = new ClienteRepositoryDatabase($conexao);
$produtoRepositoryDatabase  = new ProdutoRepositoryDatabase($conexao);
$historicoDeCalculoRepositoryDatabase = new HistoricoDeCalculoRepositoryDatabase($conexao); 
$historicoDePremioRepositoryDatabase = new HistoricoDePremioRepositoryDatabase($conexao); 
$climate = new \League\CLImate\CLImate;

$progress = $climate->progress()->total(100);

for ($i = 0; $i <= 100; $i++) {
  $progress->current($i);
  usleep(10000);
}

$controllers = [
    '1'   => ListarClienteController::class,
    '2'   => ListarProdutoController::class,
    '3'   => ListarHistoricoDeCalculo::class,
    '4'   => ListarHistoricoDePremio::class,
    '5'   => AtualizaNomeController::class,
    '6'   => AtualizaPrecoEtanol::class,
    '7'   => AtualizaPrecoGasolina::class,
    '8'   => ListarPrecoGasolinaAtual::class,
    '9'   => ListarPrecoEtanolAtual::class,
    '10'  => CalcularGasolinaxEtanol::class,
    '11'  => ListarListaEtanol::class,
    '12'  => ListarListaGasolina::class,
    '13'  => ListarCombustivelPorData::class,
];
$service = [
    '1'   => $serviceCliente = new Cliente($clienteRepositoryDatabase),
    '2'   => $serviceProduto = new Produto($produtoRepositoryDatabase),
    '3'   => $serviceHistoricoDeCalculo = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '4'   => $serviceHistoricoDePremio = new HistoricoDePremio($historicoDePremioRepositoryDatabase),
    '5'   => $serviceCliente = new Cliente($clienteRepositoryDatabase),
    '6'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '7'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '8'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '9'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '10'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '11'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '12'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '13'   => $serviceCliente = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
];

$coluna = [
    '1' => 'null', 
    '2' => 'null', 
    '3' => 'null', 
    '4' => 'null', 
    '5' => 'null', 
    '6' => "preco_etanol",
    '7' => "preco_gasolina",
    '8' => 'null',
    '9' => 'null',
    '10' => 'null',
    '11' => 'preco_etanol',
    '12' => 'preco_gasolina',
    '13' => 'null',
];
while(true){

    $climate->clear();

    $climate->comment('PetroSoft');

    $padding = $climate->padding(20);

    $padding->label('Listar Clientes...............')->result('[1]');
    $padding->label('Listar Produtos...............')->result('[2]');
    $padding->label('Listar Historico de Calculos..')->result('[3]');
    $padding->label('Listar Historico de Premios...')->result('[4]');
    $padding->label('Atualizar cliente.............')->result('[5]');
    $padding->label('Atualizar Preço do Etanol.....')->result('[6]');
    $padding->label('Atualizar Preço do Gasolina...')->result('[7]');
    $padding->label('Listar preço da Gasolina atual')->result('[8]');
    $padding->label('Listar preço do Etanol atual..')->result('[9]');
    $padding->label('Calculadora...................')->result('[10]');
    $padding->label('Listar lista de Etanol........')->result('[11]');
    $padding->label('Listar lista de Gasolina......')->result('[12]');
    $padding->label('Listar Gasolina e Etanol Por data......')->result('[13]');


    $input = $climate->input('Selecione opção do menu');
    $input->accept([1,2,3,4,5,6,7,8,9,10,11,12,13]);

    $nameController = $input->prompt();    
    //cria obejeto Controller Dependendo do que for passado por parametro e passa o climate para criar tabela
    $controller = new $controllers[$nameController]($service[$nameController], $climate,$coluna[$nameController]);
    //chama o methodo __invok
    $controller();
    
    $inputMenu = $climate->input('Pressione <Enter> para retornar menu');
    $inputMenu->prompt();

}
