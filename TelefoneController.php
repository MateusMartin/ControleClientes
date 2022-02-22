<?php

require_once('Src/Dao/Interfaces/Telefone_Dao_Interface.php');
require_once('Src/Dao/TelefoneDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/Telefone.php');

use Dao\TelefoneDao as teleDAO;
use Classes\Telefone as Telefone;
use Classes\Database as dataBase;


session_start();

if($_SESSION['idUsuario'] > 0) {
    if ($_POST['action'] == 'CadastraTelefone') {
        $telefone = new Telefone();
        $telefone->setClienteIdCliente($_POST['idClie']);
        $telefone->setDDD($_POST['DDD']);
        $telefone->setFone($_POST['Telefone']);
        $telefone->setTipo($_POST['Tipo']);

        insertTelefone($telefone);
    } else if ($_POST['action'] == 'CarregaTabela') {
        buscaTelefoneByClie($_POST['idClie']);
    } else if ($_POST['action'] == 'EditaTelefone') {

        $telefone = new Telefone();
        $telefone->setIdTelefone($_POST['idTle']);
        $telefone->setDDD($_POST['DDD']);
        $telefone->setFone($_POST['Telefone']);
        $telefone->setTipo($_POST['Tipo']);

        editaTelefone($telefone);
    } else if ($_POST['action'] == 'DeletaTelefone') {
        deleteTelefone($_POST['idTelefone']);
    }
}


function buscaTelefoneByClie($idClie)
{
    $dataBase = new dataBase();
    $teleDao = new teleDAO();
    $ret = $teleDao->findTelefoneByClientId($dataBase,$idClie);
    echo json_encode($ret);
}

function deleteTelefone($idTelefone)
{
    $dataBase = new dataBase();
    $tleDao = new teleDAO();
    $ret = $tleDao->deleteTelefone($dataBase,$idTelefone);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }

}

function editaTelefone(Telefone $telefone)
{
    $dataBase = new dataBase();
    $telefoneDAO = new teleDAO();
    $ret = $telefoneDAO->editTelefone($dataBase,$telefone);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }
}


function insertTelefone(Telefone $telefone)
{
    $dataBase = new dataBase();
    $telefoneDAO = new teleDAO();
    $lestId = $telefoneDAO->getLestId($dataBase);
    if($lestId[0]['idTelefone'] == null)
    {
        $lestId[0]['idTelefone'] = 1;
    }
    $telefone->setIdTelefone($lestId[0]['idTelefone']);
    $ret = $telefoneDAO->insertTelefone($dataBase,$telefone);
    if($ret == 1)
    {
        echo json_encode("Success");
    }
    else
    {
        echo json_encode("Error");
    }

}
