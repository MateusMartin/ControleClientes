<?php
require_once('Src/Dao/Interfaces/Enderecos_Dao_Interface.php');
require_once('Src/Dao/EnderecoDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/Endereco.php');

use Dao\EnderecoDao as endDAO;
use Classes\Endereco as end;
use Classes\Database as dataBase;

session_start();


if($_SESSION['idUsuario'] > 0) {
    if ($_POST['action'] == 'CriarEndereco') {
        $endereco = new end();
        $endereco->setClienteIdCliente($_POST['idClie']);
        $endereco->setCep($_POST['cep']);
        $endereco->setUF($_POST['UF']);
        $endereco->setLogradouro($_POST['Rua']);
        $endereco->setNumero($_POST['Numero']);
        $endereco->setComplemento($_POST['Complemento']);
        $endereco->setBairro($_POST['Bairro']);
        $endereco->setEnderecocol($_POST['Enderecocol']);

        insertEndereco($endereco);
    } else if ($_POST['action'] == 'CarregaTabela') {

        carregaTabela($_POST['idClie']);
    } else if ($_POST['action'] == 'EditarEndereco') {
        $endereco = new end();
        $endereco->setClienteIdCliente($_POST['idClie']);
        $endereco->setCep($_POST['cep']);
        $endereco->setUF($_POST['UF']);
        $endereco->setLogradouro($_POST['Rua']);
        $endereco->setNumero($_POST['Numero']);
        $endereco->setComplemento($_POST['Complemento']);
        $endereco->setBairro($_POST['Bairro']);
        $endereco->setEnderecocol($_POST['Enderecocol']);
        $endereco->setIdEndereco($_POST['idEndereco']);

        editEndereco($endereco);

    } else if ($_POST['action'] == 'DeletaEndereco') {
        deletaEndereco($_POST['idEndereco']);
    }
}
function deletaEndereco($Endereco)
{
    $dataBase = new dataBase();
    $cliDao = new endDAO();
    $ret = $cliDao->deleteEndereco($dataBase,$Endereco);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }
}


function insertEndereco(end $endereco)
{
    $dataBase = new dataBase();
    $endDao = new endDAO();
    $lestId = $endDao->getLestId($dataBase);
    if($lestId[0]['idEndereco'] == null)
    {
        $lestId[0]['idEndereco'] = 1;
    }
    $endereco->setIdEndereco($lestId[0]['idEndereco']);
    $ret = $endDao->insertEndereco($dataBase,$endereco);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }
}

function carregaTabela($idClie)
{
    $dataBase = new dataBase();
    $endDao = new endDAO();
    $ret = $endDao->findEnderecoByClientId($dataBase,$idClie);
    echo json_encode($ret);
}

function editEndereco(end $endereco)
{
    $dataBase = new dataBase();
    $endDao = new endDAO();
    $ret = $endDao->editEndereco($dataBase,$endereco);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }
}
