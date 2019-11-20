<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Hackthon\Database\MysqlPDO;
use Hackthon\Controller\ListarClienteController;
use Hackthon\Repository\ClienteRepositoryDatabase;
use Hackthon\Service\Cliente;

$conexao = new MysqlPDO(json_decode(file_get_contents("./config/connection.json")));
$climate = new \League\CLImate\CLImate;

$progress = $climate->progress()->total(100);

for ($i = 0; $i <= 100; $i++) {
  $progress->current($i);
  usleep(10000);
}
$controllers = [
    '1'   => ListarClienteController::class,
    '2'   => ControllerAtualizaDolar::class,
    '3'   => ControllerAtualizaEuro::class,
    '4'   => ControllerDolarEuro::class
];
$clienteRepositoryDatabase = new ClienteRepositoryDatabase($conexao);
$serviceCliente = new Cliente($clienteRepositoryDatabase);
while(true){

    $climate->clear();

    $climate->comment('PetroSoft');

    $padding = $climate->padding(10);

    $padding->label('listar Clientes')->result('[1]');
    $padding->label('Atualizar Dólar')->result('[2]');
    $padding->label('Atualizar Euro')->result('[3]');
    $padding->label('Dólar x Euro')->result('[4]');

    $input = $climate->input('Selecione opção do menu');
    $input->accept([1,2,3,4]);

    $nameController = $input->prompt();    

    $controller = new $controllers[$nameController]($serviceCliente, $climate);
    $controller();

    $inputMenu = $climate->input('Pressione <Enter> para retornar menu');
    $inputMenu->prompt();

}
