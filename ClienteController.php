<?php
require_once('Src/Dao/Interfaces/Cliente_Dao_Interface.php');
require_once('Src/Dao/ClienteDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/Cliente.php');

use Dao\ClienteDao as cliDAO;
use Classes\Cliente as Cli;
use Classes\Database as dataBase;

session_start();

if($_SESSION['idUsuario'] > 0){

if($_POST['action'] == 'CriarUsuario')
{
    $cli = new Cli();
    $cli->setNome($_POST['Nome']);
    $cli->setCpf($_POST['Cpf']);
    $cli->setDtNasc($_POST['Dtnasc']);
    $cli->setTipo($_POST['Tipo']);
    $cli->setUsuarioIdUsuario($_SESSION['idUsuario']);
    insertUsuario($cli);

} else if($_POST['action'] == 'CarregaTabela')
{
    buscaClientes($_SESSION['idUsuario']);
}else if($_POST['action'] == 'EditarUsuario')
{

    $cli = new Cli();
    $cli->setIdCliente($_POST['idClie']);
    $cli->setNome($_POST['Nome']);
    $cli->setCpf($_POST['Cpf']);
    $cli->setDtNasc($_POST['Dtnasc']);
    $cli->setTipo($_POST['Tipo']);
    $cli->setUsuarioIdUsuario($_SESSION['idUsuario']);

    editaCliente($cli);
} else if($_POST['action'] == "DeletarCliente")
{
    deletarCliente($_POST['idCliente']);
}

}

function insertUsuario(Cli $cliente)
{
    $dataBase = new dataBase();
    $cliDao = new cliDAO();
    $lestId = $cliDao->getLestId($dataBase);
    if($lestId[0]['idCliente'] == null)
    {
        $lestId[0]['idCliente'] = 1;
    }
    $cliente->setIdCliente($lestId[0]['idCliente']);
    $ret = $cliDao->insertUser($dataBase,$cliente);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }

}

function editaCliente(Cli $cliente)
{
    $dataBase = new dataBase();
    $cliDao = new cliDAO();
    $ret = $cliDao->editCliente($dataBase,$cliente);

    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }


}

function buscaClientes($idUsuario)
{
    $dataBase = new dataBase();
    $cliDao = new cliDAO();
    $ret = $cliDao->findClienteByUserId($dataBase,$idUsuario);
    echo json_encode($ret);
}

function deletarCliente($idCliente)
{
    $dataBase = new dataBase();
    $cliDao = new cliDAO();
    $ret = $cliDao->deleteCliente($dataBase,$idCliente);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }
}




