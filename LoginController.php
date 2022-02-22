<?php


require_once('Src/Dao/Interfaces/User_Dao_Interface.php');
require_once('Src/Dao/UserDao.php');
require_once('Src/Classes/Database.php');
require_once('Src/Classes/User.php');
require_once('Src/Dao/Interfaces/Logs_Dao_Interface.php');
require_once('Src/Dao/LogsDao.php');
require_once('Src/Classes/Logs.php');

use Dao\UserDao as usrDAO;
use Classes\User as user;
use Classes\Database as dataBase;
use Classes\Logs as Logs;
use Dao\LogsDao as logsDao;


if($_POST['action'] == 'Logar')
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    logar($login, $senha);
} else if ($_POST['action'] == 'Deslogar')
{
    deslogar();
}

function logar($login, $senha)
{

    $dataBase = new dataBase();
    $userDAO = new usrDAO();
    $user = $userDAO->login($dataBase,$login,$senha);
    session_start();
    $isTouch = isset($user[0]['idUsuario']);
    if($isTouch == true){
    $_SESSION['idUsuario'] = $user[0]['idUsuario'];
    registraAcesso($user[0]['idUsuario']);
        echo json_encode($user[0]);
    } else
    {
        $_SESSION['idUsuario'] = 0;
        echo json_encode("LoginErrado");
    }
}


function registraAcesso($iduser)
{
    $dataBase = new dataBase();
    $logsDao = new logsDao();
    $logs = new Logs();
    $lestId = $logsDao->getLestId($dataBase);
    if($lestId[0]['idLogs'] == null)
    {
        $lestId[0]['idLogs'] = 1;
    }
    $logs->setIdLogs($lestId[0]['idLogs']);
    $msgLog = "Usuario logou ";
    $msgLog .= date("Y-m-d H:i:s");
    $logs->setDescricao($msgLog);
    $logs->setUsuarioIdUsuario($iduser);
    $logsDao->registraLogs($dataBase,$logs);

}

function deslogar()
{
    session_start();
    $_SESSION['idUsuario'] = 0;
    echo json_encode("Success");

}