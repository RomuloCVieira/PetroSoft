<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Hackthon\Database\MysqlPDO;
use Hackthon\Controller\ListarClienteController;
use Hackthon\Controller\ListarProdutoController;
use Hackthon\Controller\ListarHistoricoDeCalculo;
use Hackthon\Controller\ListarHistoricoDePremio;
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
];
$service = [
    '1'   => $serviceCliente = new Cliente($clienteRepositoryDatabase),
    '2'   => $serviceProduto = new Produto($produtoRepositoryDatabase),
    '3'   => $serviceHistoricoDeCalculo = new HistoricoDeCalculo($historicoDeCalculoRepositoryDatabase),
    '4'   => $serviceHistoricoDePremio = new HistoricoDePremio($historicoDePremioRepositoryDatabase),
];



while(true){

    $climate->clear();

    $climate->comment('PetroSoft');

    $padding = $climate->padding(10);

    $padding->label('Listar Clientes')->result('[1]');
    $padding->label('Listar Produtos')->result('[2]');
    $padding->label('Listar Historico de Calculos')->result('[3]');
    $padding->label('Listar Historico de Premios')->result('[4]');

    $input = $climate->input('Selecione opção do menu');
    $input->accept([1,2,3,4]);

    $nameController = $input->prompt();    
    //cria obejeto Controller Dependendo do que for passado por parametro e passa o climate para criar tabela
    $controller = new $controllers[$nameController]($service[$nameController], $climate);
    //chama o methodo __invok
    $controller();
    
    $inputMenu = $climate->input('Pressione <Enter> para retornar menu');
    $inputMenu->prompt();

}
